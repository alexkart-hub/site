@php
    /**
     * @var \App\Models\Category $categories
     * @var \App\Models\Category $curCategory
     */
    $prevLevel = 0;
    $curId = '';
    $id0 = '';
    $isParent = false;
@endphp
<aside class="single_sidebar_widget post_category_widget">
    <h4 class="widget_title">Темы</h4>
    <ul class="list cat-list">
        @foreach($categories as $category)
            @if ($category->posts()->count() <= 0)
                @continue
            @endif
            @php
                $isParent = $category->margin_right - $category->margin_left > 1;
                $selected = $category->id == $curCategory->id;
            @endphp
            @if ($prevLevel > 0 && $category->level < $prevLevel)
                @if($category->level == 1)
                        <?= str_repeat("</ul></li>", 1) ?>
                @elseif($category->level > 1)
                        <?= str_repeat("</li></ul>", $prevLevel - $category->level); ?>
                @endif
            @endif
            @if ($isParent)
                @if ($category->level == 1)
                    <li>
                        <a href="{{ route('category', ['categoryCode' => $category->code]) }}"
                           class="d-flex  @if ($selected) active @endif">
                            <p>{{ $category->name }}</p>
                            <p>({{ $category->posts->count() }})</p>
                        </a>
                @elseif ($category->level > 1)
                    <ul class="cat-list-second ">
                        <li>
                            <a href="{{ route('category', ['categoryCode' => $category->code]) }}"
                               class="d-flex @if ($selected) active @endif">
                                <p>{{ $category->name }}</p>
                                <p>({{ $category->posts->count() }})</p>
                            </a>
                @endif
            @else
                 @if ($category->level == 1)
                    <li>
                        <a href="{{ route('category', ['categoryCode' => $category->code]) }}"
                           class="d-flex @if ($selected) active @endif">
                            <p>{{ $category->name }}</p>
                            <p>({{ $category->posts->count() }})</p>
                        </a>
                    </li>
                @else
                    <ul class="cat-list-second">
                        <li>
                            <a href="{{ route('category', ['categoryCode' => $category->code]) }}"
                               class="d-flex @if ($selected) active @endif">
                                <p>{{ $category->name }}</p>
                                <p>({{ $category->posts->count() }})</p>
                            </a>
                        </li>
                @endif
            @endif
           <?php $prevLevel = $category->level; ?>
        @endforeach
        @if ($prevLevel > 1)
                <?= str_repeat("</ul></li>", ($prevLevel - 1)); ?>
        @endif
   </ul>
</aside>

