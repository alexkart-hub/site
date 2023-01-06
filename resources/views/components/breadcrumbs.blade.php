<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                @if (in_array(\Illuminate\Support\Facades\Route::currentRouteName(),['post', 'search']))
                    @php($style = true)
                @else
                    @php($style = false)
                @endif
                <ul class="breadcrumb" @if($style) style="background-color: #fff;" @endif>
                    @foreach($breadcrumbs as $crumb)
                        <li class="breadcrumb-item @if ($crumb->active) active @endif">
                            @if ($crumb->active)
                                {{ $crumb->title }}
                            @else
                                <a href="{{ $crumb->link }}">{{ $crumb->title }}</a>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</div>
