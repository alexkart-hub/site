@include('partials.leftBar.header')

@include('partials.leftBar.searchForm.index')
<x-menu-categories :cur-category=$curCategory />
{{--@include('partials.leftBar.popularPosts.index')--}}
@include('partials.leftBar.tagCloud.index')
{{--@include('partials.leftBar.feedbackForm.index')--}}

@include('partials.leftBar.footer')
