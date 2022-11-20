<div class="single-post">
    <div class="blog_details">
        <h1>{{ $post->title }}
        </h1>
        @if (!empty($post->thumbnail))
            <div class="feature-img">
                <img class="img-fluid" src="{{ route('postImage', ['filename' => $post->thumbnail]) }}" alt="">
            </div>
        @endif
        <ul class="blog-info-link mt-3 mb-4">
            <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
            <li><a href="#comments"><i class="fa fa-comments"></i> {{ $count = $post->comments()->count() }} {{\App\Models\Helper::getCommentWordByCount($count)}}</a></li>
        </ul>
        <span class="excert">
            {!! $post->preview_text !!}
        </span>
        <p>{!! $post->detail_text !!}</p>
    </div>
</div>
