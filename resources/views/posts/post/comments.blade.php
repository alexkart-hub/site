<div class="comment-form">
    <h4>Оставить комментарий</h4>
    <form class="form-contact comment_form" action="{{ route('comment', $post->id) }}" method="POST" id="commentForm"
          data-id="{{ $post->id }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                              <textarea class="form-control w-100 @error('text') border-danger @enderror" name="text" id="comment" cols="30" rows="9"
                                        placeholder="Текст комментария"></textarea>
                    @error('text')
                    <p class="danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="button button-contactForm btn_1 boxed-btn">Оставить комментарий</button>
        </div>
    </form>
</div>
<div class="comments-area">
    <h4>05 Comments</h4>
    @foreach($post->comments as $comment)
        <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="/assets/img/comment/comment_1.png" alt="">
                    </div>
                    <div class="desc">
                        <p class="comment">
                            {{ $comment->text }}
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <h5>
                                    <a href="#">{{ $comment->user->name }}</a>
                                </h5>
                                <p class="date">December 4, 2017 at 3:12 pm </p>
                            </div>
                            <div class="reply-btn">
                                <a href="#" class="btn-reply text-uppercase">reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
</div>
