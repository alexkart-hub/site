<!-- job_listing_area_start  -->
<div class="job_listing_area">
    <div class="container">
        @if (\Illuminate\Support\Facades\Route::currentRouteName() != 'category')
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="section_title">
                        <h3>{{ $curCategory->value('title') }}</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="brouse_job text-right">
                        <a href="jobs.html" class="boxed-btn4">Browse More Job</a>
                    </div>
                </div>
            </div>
        @endif
        <div class="job_lists">
            <div class="row">
