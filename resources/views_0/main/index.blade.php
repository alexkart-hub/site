@extends('layout.app')

@section('title', 'Главная страница')
@section('description', 'Собираю на этом сайте всю информацию, которая мне нужна.')

@section('content')
    @include('main.header')
    @foreach($themes as $theme)
        @include('categories.item', [
            'theme' => $theme
        ])
    @endforeach
    {{ $themes->links('partials.pagination') }}

    @include('main.footer')
@endsection
