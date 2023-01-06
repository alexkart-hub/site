@include('partials.leftBar.header')
{{--@include('partials.leftBar.searchForm.index')--}}
@php($curCategory = $curCategory ?? '')
<x-menu-categories :cur-category=$curCategory />
{{--@include('partials.leftBar.popularPosts.index')--}}
@include('partials.leftBar.tagCloud.index')
{{--@include('partials.leftBar.feedbackForm.index')--}}

@include('partials.leftBar.footer')
