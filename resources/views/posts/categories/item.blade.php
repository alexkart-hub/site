{{--<section class="docs-section" id="item-4-{{ $num }}">--}}
{{--    <h2 class="section-heading">{{ $post->title }}</h2>--}}
{{--    <p>{!! $post->preview_text !!}</p>--}}
{{--</section><!--//section-->--}}
<div class="col-lg-12 col-md-12">
    <div class="single_jobs white-bg d-flex justify-content-between">
        <div class="jobs_left d-flex align-items-center">
            <div class="thumb">
                <img src="/assets/img/svg_icon/1.svg" alt="">
            </div>
            <div class="jobs_conetent">
                <a href="#"><h4>{{ $post->title }}</h4></a>
                <div class="links_locat d-flex align-items-center">
                    <div class="location">
                        <p>{!! $post->preview_text !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="jobs_right">
            <div class="apply_now">
                <a class="heart_mark" href="#"> <i class="ti-heart"></i> </a>
                <a href="#" class="boxed-btn3">Apply Now</a>
            </div>
            <div class="date">
                <p>{!! $post->created_at !!}</p>
            </div>
        </div>
    </div>
</div>
