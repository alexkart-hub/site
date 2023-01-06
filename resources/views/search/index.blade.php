@extends('layout.app')

@section('content')
    @include('search.header')
    @include('search.content')
    @include('partials.leftBar.index')
    @include('search.footer')
@endsection
