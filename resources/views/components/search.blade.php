<div class="container">
    <div class="row justify-content-center mt-2">
        <div class="col-xl-9 col-lg-12">
            <aside class="">
                <form action="#">
                    <div class="form-group-top">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder='{{ \Illuminate\Support\Facades\Route::currentRouteName() }}'
                                   onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Search Keyword'">
                            <div class="input-group-append">
                                <button class="btn" type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </aside>
        </div>
    </div>
</div>
