@extends('layout.app')

@section('content')
@include('posts.post.header')
@include('posts.post.content')
@include('posts.post.nav')
@include('posts.post.comments')
@include('partials.leftBar.index', ['curCategory' => $page->category])
@include('posts.post.footer')
@endsection
