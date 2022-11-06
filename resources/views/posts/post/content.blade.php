@php
    $prevUrl = !empty($postPrev) ? route('post', ['categoryCode' => $curCategory->value('code'), 'postCode' => $postPrev['code']]) : '';
    $nextUrl = !empty($postNext) ? route('post', ['categoryCode' => $curCategory->value('code'), 'postCode' => $postNext['code']]) : '';
@endphp
<div class="col-lg-9 order-lg-2 posts-list">
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
                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
            </ul>
            <span class="excert">
                {{ $post->preview_text }}
            </span>
            <p>{{ $post->detail_text }}</p>
            <div class="quote-wrapper">
                <div class="quotes">
                    MCSE boot camps have its supporters and its detractors. Some people do not understand why you
                    should have to spend money on boot camp when you can get the MCSE study materials yourself at
                    a fraction of the camp price. However, who has the willpower to actually sit through a
                    self-imposed MCSE training.
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-top">
        <div class="d-sm-flex justify-content-between text-center">
            <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
                people like this</p>
            <div class="col-sm-4 text-center my-2 my-sm-0">
                <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p>
            </div>
            <ul class="social-icons">
                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                <li><a href="#"><i class="fa fa-behance"></i></a></li>
            </ul>
        </div>
        <div class="navigation-area">
            <div class="row">
                <div
                    class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                    @if (!empty($prevUrl))
                        <div class="thumb">
                            <a href="{{ $prevUrl }}">
                                <img class="img-fluid post-nav-img" src="/assets/img/favicon.png" alt="">
                            </a>
                        </div>
                        <div class="arrow">
                            <a href="{{ $prevUrl }}">
                                <span class="lnr text-white ti-arrow-left"></span>
                            </a>
                        </div>
                        <div class="detials">
                            <p>Предыдущая заметка</p>
                            <a href="{{ $prevUrl }}">
                                <h4>{{ $postPrev['title'] }}</h4>
                            </a>
                        </div>
                    @endif
                </div>
                <div
                    class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                    @if (!empty($nextUrl))
                        <div class="detials">
                            <p>Следующая заметка</p>
                            <a href="{{ $nextUrl }}">
                                <h4>{{ $postNext['title'] }}</h4>
                            </a>
                        </div>
                        <div class="arrow">
                            <a href="{{ $nextUrl }}">
                                <span class="lnr text-white ti-arrow-right"></span>
                            </a>
                        </div>
                        <div class="thumb">
                            <a href="{{ $nextUrl }}">
                                <img class="img-fluid post-nav-img" src="/assets/img/favicon.png" alt="">
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="blog-author">
        <div class="media align-items-center">
            <img src="/assets/img/blog/author.png" alt="">
            <div class="media-body">
                <a href="#">
                    <h4>Harvard milan</h4>
                </a>
                <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                    our dominion twon Second divided from</p>
            </div>
        </div>
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
    <div class="comment-form">
        <h4>Leave a Reply</h4>
        <form class="form-contact comment_form" action="{{ route('comment', $post->id) }}" method="POST" id="commentForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                              <textarea class="form-control w-100 @error('text') border-danger @enderror" name="text" id="comment" cols="30" rows="9"
                                        placeholder="Оставьте комментарий"></textarea>
                        @error('text')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
            </div>
        </form>
    </div>
</div>
