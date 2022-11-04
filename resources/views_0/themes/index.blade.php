@extends('layout.app')

@section('title', "{$theme->value('title')}")
@section('description', "Группа записей по теме {$theme->value('title')}")

@section('content')

        @include('categories.header')

        <?php $num = 1 ?>
        @foreach($posts as $post)
            @include('posts.item',[
                'post' => $post,
                'num' => $num++
            ])
        @endforeach

        {{ $posts->links('partials.pagination') }}

@endsection
