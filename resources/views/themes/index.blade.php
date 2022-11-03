@extends('layout.app')

@section('title', "Список тем")
@section('description', "Список тем")

@section('content')

        @include('themes.header')

        <?php $num = 1 ?>
        @foreach($themes as $theme)
            @include('themes.item',[
                'theme' => $theme
            ])
        @endforeach

        @include('themes.footer')

        {{ $themes->links('partials.pagination') }}

@endsection
