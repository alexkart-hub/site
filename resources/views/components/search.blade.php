<div class="container">
    <div class="row justify-content-start mt-2">
        <div class="col-xl-11 col-lg-12">
            <aside class="">
                <form action="{{ route('search') }}">
                    @csrf
                    <div class="form-group-top">
                        <div class="input-group">
                            <input type="text" class="form-control" name="query"
                                   placeholder='Введите фразу для поиска'
                                   onfocus="this.placeholder = ''"
                                   onblur="this.placeholder = 'Search Keyword'"
                                   value="@yield('query')"
                            >
                            <div class="input-group-append">
                                <button class="btn" type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </aside>
        </div>
    </div>
</div>
