@include('posts.categories.header')
@foreach($page->posts as $post)
    @include('posts.categories.item',[
        'post' => $post,
        'curCategory' => $page->category
    ])
@endforeach
{{ $page->posts->links('partials.pagination') }}
@include('posts.categories.footer')
