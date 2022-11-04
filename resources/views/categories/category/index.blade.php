@extends('layout.app')

@section('title', "{$category->value('title')}")
@section('description', "Список тем")

@section('content')

    @include('categories.category.header')

    <?php $num = 1 ?>
    @foreach($posts as $post)
        @include('posts.item',[
            'post' => $post,
            'num' => $num++
        ])
    @endforeach

    @include('categories.category.footer')

    {{ $posts->links('partials.pagination') }}

@endsection
