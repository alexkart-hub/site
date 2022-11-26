@extends('layout.app')

@section('content')

    @include('categories.header')

    @foreach($page->categories as $category)
        @if ($category->posts()->count() > 0)
            @include('categories.item',[
                'category' => $category
            ])
        @endif
    @endforeach

    @include('categories.footer')

    {{ $page->categories->links('partials.pagination') }}

@endsection
