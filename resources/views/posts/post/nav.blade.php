@php
    /**
     */
        $prevUrl = !empty($page->postPrev) ? route('post', ['categoryCode' => $page->category->code, 'postCode' => $page->postPrev['code']]) : '';
        $nextUrl = !empty($page->postNext) ? route('post', ['categoryCode' => $page->category->code, 'postCode' => $page->postNext['code']]) : '';
        $count = $page->post->comments()->count();
@endphp
<div class="navigation-top" id="comments">
    <div class="d-sm-flex justify-content-between text-center">
        <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> Lily and 4
            people like this</p>
        <div class="col-sm-4 text-center my-2 my-sm-0">
            <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> {{ $count }} {{ \App\Models\Helper::getCommentWordByCount($count) }}</p>
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
