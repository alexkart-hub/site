@section('title', isset($page) ? $page->getTitle() : '')
@section('description', isset($page) ? $page->getDescription() : '')
@include('partials.header')
@yield('content')
@include('partials.footer')
