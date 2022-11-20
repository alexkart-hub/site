@php
/**
 * @var $curCategory
 * @var $post
 */
    $url = route('post', ['categoryCode'=>$curCategory->code, 'postCode' => $post->code]);
    $imgSrc = $post->thumbnail ? '/storage/posts/' . $post->thumbnail : '/assets/img/svg_icon/1.svg';
@endphp
<div class="col-lg-12 col-md-12">
    <div class="single_jobs white-bg d-flex justify-content-between">
        <div class="jobs_left d-flex align-items-center">
            <div class="thumb" @if($post->thumbnail) style="padding: 0" @endif>
                <img src="{{ $imgSrc }}" alt="{{ $post->title }}">
            </div>
            <div class="jobs_conetent">
                <a href="{{ $url }}"><h4>{{ $post->title }}</h4></a>
                <div class="links_locat d-flex align-items-center">
                    <div class="location">
                        <p>{!! $post->preview_text !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="jobs_right">
            <div class="apply_now">
                <a class="heart_mark" href="javascript:void(0)"> <i class="ti-heart"></i> </a>
                <a href="{{ $url }}" class="boxed-btn3">Перейти</a>
            </div>
            <div class="date">
                <p>{{ $post->created_at }}</p>
            </div>
        </div>
    </div>
</div>
