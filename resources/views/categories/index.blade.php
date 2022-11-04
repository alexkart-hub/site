@extends('layout.app')

@section('title', "Список тем")
@section('description', "Список тем")

@section('content')

    @include('categories.header')

    <?php $num = 1 ?>
    @foreach($categories as $category)
        @include('categories.item',[
            'category' => $category
        ])
    @endforeach

    @include('categories.footer')

    {{ $categories->links('partials.pagination') }}

@endsection
