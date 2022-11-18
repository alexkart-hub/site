@extends('layout.app')

@section('title', "{$user->name}")
@section('description', "{$user->name}")

@section('content')
    @include('users.profile.content')
@endsection
