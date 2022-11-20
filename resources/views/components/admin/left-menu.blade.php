<div class="col-lg-3  order-lg-1">
    <div class="job_filter white-bg">
        <div class="form_inner white-bg">
            <h2>Меню</h2>
            <div class="accordion" id="accordionExample">
                @foreach($menu as $key => $menuItem)
                    <div class="card">
                        <div class="card-header" id="heading{{ $key }}">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse"
                                        data-target="#collapse{{ $key }}" aria-expanded="true"
                                        aria-controls="collapse{{ $key }}">
                                    {{ $menuItem['title'] }}
                                </button>
                            </h2>
                        </div>
                        <div id="collapse{{ $key }}" class="collapse @if($key == 0) show @endif"
                             aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
                            <div class="card-body">
                                <ul class="list cat-list">
                                    @foreach($menuItem['items'] as $item)
                                        <li>
                                            @if (!\Illuminate\Support\Facades\Route::getCurrentRoute()->named($item['routeName']))
                                                <a href="{{ route($item['routeName']) }}"
                                                   class="d-flex active">
                                                    <p>{{ $item['title'] }}</p>
                                                </a>
                                            @else
                                                <p>{{ $item['title'] }}</p>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
