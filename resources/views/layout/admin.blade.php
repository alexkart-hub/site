@include('admin.partials.header')
@yield('content')
@if(\Illuminate\Support\Facades\Route::currentRouteName() != 'admin.login')
<x-admin.left-menu/>
@endif
@include('admin.partials.footer')
