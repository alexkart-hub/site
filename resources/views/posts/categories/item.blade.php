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
        <a href="{{ $url }}">
            <div class="jobs_left d-flex align-items-center">
                <div class="thumb" @if($post->thumbnail) style="padding: 0" @endif>
                    <img src="{{ $imgSrc }}" alt="{{ $post->title }}">
                </div>
                <div class="jobs_conetent">
                    <h2>{{ $post->title }}</h2>
                    <div class="links_locat d-flex align-items-center">
                        <div class="location">
                            <p>{!! $post->preview_text !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <div class="jobs_right">
            <div class="date d-inline-flex">
                <p>{{ $post->created_at }}</p>
            </div>
            <div class="apply_now d-inline-flex">
                <a class="heart_mark" href="javascript:void(0)"> <i class="ti-heart"></i> </a>
            </div>
        </div>
    </div>
</div>
