<div class="col-12 col-xl-3 col-lg-4 py-3">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-3">
                <span class="card-title-text">{{ $theme->title }}</span>
            </h5>
            <div class="card-text">
                {{ $theme->description }}
            </div>
            <a class="card-link-mask" href="{{ route('theme', $theme->code) }}"></a>
        </div><!--//card-body-->
    </div><!--//card-->
</div><!--//col-->
