@include('posts.categories.header')
@foreach($posts as $post)
    @include('posts.categories.item',[
        'post' => $post,
        'curCategory' => $curCategory
    ])
@endforeach
{{ $posts->links('partials.pagination') }}
@include('posts.categories.footer')
