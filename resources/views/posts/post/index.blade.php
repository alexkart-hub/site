@extends('layout.app')

@section('title', "{$post->title}")
@section('description', "{$post->preview_text}")

@section('content')
@include('posts.post.header')
@include('posts.post.content')
@include('partials.leftBar.index')
@include('posts.post.footer')
@endsection
