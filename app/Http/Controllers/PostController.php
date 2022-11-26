<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentForm;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends WebController
{
    public function index()
    {
        return view($this->page->getView(), $this->page->getData());
    }

    public function comment($postId, CommentForm $request)
    {
        $post = Post::findOrFail($postId);
        $category = Category::findOrFail($post->category_id);
        $post->comments()->create($request->validated());
        $url = route('post', ['categoryCode' => $category->code, 'postCode' => $post->code]);
        return redirect($url . '#comments');
    }

    public function commentApprove(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $comment = Comment::find($id);
        $comment->approved = 1;
        $comment->save();
        return response()->json(['success' => 'Комментарий подтвержден']);
    }

    public function commentDelete(Request $request): \Illuminate\Http\JsonResponse
    {
        $id = $request->get('id');
        $comment = Comment::find($id);
        $comment->delete();
        return response()->json(['success' => 'Комментарий удален']);
    }
}
