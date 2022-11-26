@extends('layout.app')

@section('content')

    @include('categories.category.header')
    @foreach($page->categories as $category)
        @if ($category->posts()->count() > 0)
            @include('categories.item',[
                'category' => $category
            ])
        @endif
    @endforeach
    @if (empty($page->posts))
        @include('categories.footer')
        {{ $page->categories->links('partials.pagination') }}
    @else
        @include('categories.category.footer')

        @include('categories.category.contentBlock.header')
        @include('posts.categories.index')
        @include('partials.leftBar.index',['curCategory' => $page->category])
        @include('categories.category.contentBlock.footer')
        @include('categories.footer')
    @endif
@endsection
