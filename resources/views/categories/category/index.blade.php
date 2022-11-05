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
    @if (empty($posts))
        @include('categories.footer')
        {{ $categories->links('partials.pagination') }}
    @else
        @include('categories.category.footer')

        @include('categories.category.contentBlock.header')
        @include('posts.categories.index')
        @include('partials.leftBar.index')
        @include('categories.category.contentBlock.footer')
    @endif
@endsection
