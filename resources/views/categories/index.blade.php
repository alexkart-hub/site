@extends('layout.app')

@section('title', "Список тем")
@section('description', "Список тем")

@section('content')

    @include('categories.header')

    @foreach($categories as $category)
        @if ($category->posts()->count() > 0)
            @include('categories.item',[
                'category' => $category
            ])
        @endif
    @endforeach

    @include('categories.footer')

    {{ $categories->links('partials.pagination') }}

@endsection
