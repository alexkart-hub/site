@extends('layout.app')

@section('title', "{$curCategory->value('title')}")
@section('description', "Список тем")

@section('content')

    @include('categories.category.header')
    @foreach($categories as $category)
        @include('categories.item',[
            'category' => $category
        ])
    @endforeach
    @include('categories.category.footer')

    @include('posts.categories.header')
    @foreach($posts as $post)
        @include('posts.categories.item',[
            'post' => $post,
            'curCategory' => $curCategory
        ])
    @endforeach
    @include('posts.categories.footer')

    {{ $posts->links('partials.pagination') }}

@endsection
