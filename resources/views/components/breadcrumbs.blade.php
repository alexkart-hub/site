<div class="container pt-2">
    <div class="row">
        <div class="col-lg-12">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
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
