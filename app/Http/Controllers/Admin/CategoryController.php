<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryFormRequest;
use App\Http\Requests\ContactFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $categories = Category::query()
            ->orderBy('margin_left', 'asc')
            ->get();
        return view('admin.categories.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $categories = Category::query()
            ->orderBy('margin_left', 'asc')
            ->get();
        return view('admin.categories.edit', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $parent = null;
        if (!empty($data['parent_id'])) {
            $parent = Category::query()->where('id', $data['parent_id'])->first();
        }
        $data['level'] = $parent ? $parent->level + 1 : 1;
        $data['margin_left'] = '0';
        $data['margin_right'] = '0';
        $cur = Category::create($data);
        $this->recalcMargin($cur, $parent);
        return redirect(route('admin.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::query()
            ->orderBy('margin_left', 'asc')
            ->get();
        return view('admin.categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryFormRequest $request
     * @param int $id
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);
        if ($category->parent_id != $data['parent_id']) {
            if ($data['parent_id']) {
                $parentNew = Category::query()
                    ->where('id', $data['parent_id'])
                    ->first();
            }
            if ($category->parent_id) {
                $parent = Category::query()
                    ->where('id', $category->parent_id)
                    ->first();
            }
            $this->recalcMarginChangeParent($category, $parentNew ?? null, $parent ?? null);
        }
        $category->update($data);
        return redirect(route('admin.categories.edit', $id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     */
    public function destroy($id)
    {
        $this->recalcMarginDestroy(Category::findOrFail($id));
        Category::destroy($id);
        return redirect(route('admin.categories.index'));
    }

    protected function recalcMargin(Category $curCategory, Category $parentNew = null, Category $parentOld = null)
    {
        if ($parentNew === null) {
            $this->recalcMarginNewFirstLevel($curCategory);
        } elseif ($parentNew !== null && $parentOld === null) {
            $this->recalcMarginNew($curCategory, $parentNew);
        }
    }

    protected function recalcMarginChangeParent(Category $curCategory, Category $parentNew = null, Category $parentOld = null)
    {
        $parentNewId = $parentNew ? $parentNew->id : 0;
        $parentOldId = $parentOld ? $parentOld->id : 0;
        $distance = $curCategory->margin_right - $curCategory->margin_left + 1;
        $removedCategories = Category::query()
            ->where('margin_left', '>=', $curCategory->margin_left)
            ->where('margin_right', '<=', $curCategory->margin_right)
            ->orderBy('margin_left')
            ->get();
        if ($parentNew) {
            $remove_forward = $curCategory->margin_left < $parentNew->margin_left;
            $remove_top = $curCategory->margin_right < $parentNew->margin_right;
        } else {
            $recalcCategories = Category::query()
                ->where('margin_right', '>', $curCategory->margin_right)
                ->orderBy('margin_left')
                ->get();
            $lastCategoryFirstLevel = Category::query()
                ->where('level', 1)
                ->orderBy('margin_right', 'desc')
                ->first();
            $diff = $lastCategoryFirstLevel->margin_right - $curCategory->margin_right;
            $lastLevel = $curCategory->level;
            foreach ($removedCategories as $category) {
                $category->margin_left += $diff;
                $category->margin_right += $diff;
                $category->level = $category->level - $lastLevel + 1;
                $category->save();
            }
            foreach ($recalcCategories as $category) {
                $category->margin_right -= $distance;
                if ($category->margin_left > $curCategory->margin_right) {
                    $category->margin_left -= $distance;
                }
                $category->save();
            }
            return;
        }
        if ($remove_forward) {
            $recalcCategories = Category::query()
                ->where('margin_right', '>', $curCategory->margin_right)
                ->where('margin_left', '<=', $parentNew->margin_left)
                ->orderBy('margin_left')
                ->get();
            foreach ($recalcCategories as $category) {
                if ($category->margin_left > $curCategory->margin_right && $category->margin_left <= $parentNew->margin_left) {
                    $category->margin_left -= $distance;
                }
                if ($category->margin_right > $curCategory->margin_right && $category->margin_right < $parentNew->margin_left) {
                    $category->margin_right -= $distance;
                }
                $category->save();
            }
            $diff =  $parentNew->margin_right - $curCategory->margin_left - $distance;
            $level_dif = $parentNew->level - $curCategory->level + 1;
            foreach ($removedCategories as $category) {
                $category->margin_left += $diff;
                $category->margin_right += $diff;
                $category->level += $level_dif;
                $category->save();
            }
        } elseif (!$remove_top) {
            $recalcCategories = Category::query()
                ->where('margin_left', '<', $curCategory->margin_left)
                ->where('margin_right', '>=', $parentNew->margin_right)
                ->orderBy('margin_left')
                ->get();
            foreach ($recalcCategories as $category) {
                if ($category->margin_left < $curCategory->margin_left && $category->margin_left > $parentNew->margin_right) {
                    $category->margin_left += $distance;
                }
                if ($category->margin_right < $curCategory->margin_left && $category->margin_right >= $parentNew->margin_right) {
                    $category->margin_right += $distance;
                }
                $category->save();
            }
            $level_dif = $parentNew->level - $curCategory->level + 1;
            $diff = $curCategory->margin_right - $parentNew->margin_left - $distance;
            foreach ($removedCategories as $category) {
                $category->margin_left -= $diff;
                $category->margin_right -= $diff;
                $category->level += $level_dif;
                $category->save();
            }
        } else {
            $recalcCategories = Category::query()
                ->where('margin_right', '>', $curCategory->margin_right)
                ->where('margin_right', '<', $parentNew->margin_right)
                ->orderBy('margin_left')
                ->get();
            foreach ($recalcCategories as $category) {
                $category->margin_right -= $distance;
                if ($category->margin_left > $curCategory->margin_right) {
                    $category->margin_left -= $distance;
                }
                $category->save();
            }
            $level_dif = $parentNew->level - $curCategory->level + 1;
            $diff =  $parentNew->margin_right - $curCategory->margin_left - $distance;
            foreach ($removedCategories as $category) {
                $category->margin_left += $diff;
                $category->margin_right += $diff;
                $category->level += $level_dif;
                $category->save();
            }
        }

    }

    protected function recalcMarginNewFirstLevel(Category $curCategory)
    {
        $lastCategoryFirstLevel = Category::query()
            ->where('level', 1)
            ->orderBy('margin_right', 'desc')
            ->first();
        $curCategory->margin_left = $lastCategoryFirstLevel->margin_right + 1;
        $curCategory->margin_right = $lastCategoryFirstLevel->margin_right + 2;
        $curCategory->save();
    }

    protected function recalcMarginNew(Category $curCategory, Category $parent)
    {
        $otherCategories = Category::query()
            ->where('margin_left', '>', $parent->margin_right)
            ->where('margin_right', '>', $parent->margin_right, 'or')
            ->get();
        $curCategory->margin_left = $parent->margin_right;
        $curCategory->margin_right = $parent->margin_right + 1;
        $parent->margin_right = $parent->margin_right + 2;
        $curCategory->save();
        $parent->save();
        foreach ($otherCategories as $category) {
            if ($category->margin_left > $curCategory->margin_left) {
                $category->margin_left += 2;
            }
            $category->margin_right += 2;
            $category->save();
        }
    }

    protected function recalcMarginDestroy($curCategory)
    {
        $is_parent = ($curCategory->margin_right - $curCategory->margin_left) > 1;
        if ($is_parent) {
            $children = Category::query()
                ->where('margin_left', '>', $curCategory->margin_left)
                ->where('margin_right', '<', $curCategory->margin_right)
                ->orderBy('margin_left')
                ->get();
            $margin = $curCategory->margin_left;
            foreach ($children as $child) {
                $child->margin_left = $margin++;
                $child->margin_right = $margin++;
                $child->level = $curCategory->level;
                $child->parent_id = $curCategory->parent_id;
                $child->save();
            }
        }
        $otherCategories = Category::query()
            ->where('margin_left', '>', $curCategory->margin_right)
            ->where('margin_right', '>', $curCategory->margin_right, 'or')
            ->get();
        foreach ($otherCategories as $category) {
            if ($category->margin_left > $curCategory->margin_left) {
                $category->margin_left -= 2;
            }
            $category->margin_right -= 2;
            $category->save();
        }
    }
}
