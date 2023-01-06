@php
    $query = $page->getQuery();
    $uquery = mb_strtoupper(mb_substr($query, 0 , 1)) . mb_substr($query, 1);
    $lquery = mb_strtolower(mb_substr($query, 0 , 1)) . mb_substr($query, 1);
    $replace = function ($query) { return '<span class="query">' . $query . '</span>';}
@endphp
<div class="col-lg-9 order-lg-2 posts-list">
    <h2>Результат поиска по фразе "{{ $query }}"</h2>
    @foreach($result as $item)
        @php($data = $item['_source'])
        <div class="descript_wrap white-bg">
            <div class="single_wrap">
                <h4>{{ $data['title'] }}</h4>
                @php($resStr = str_replace([$query, $uquery, $lquery], [$replace($query), $replace($uquery), $replace($lquery)], $data['detail_text']))
                {!! $resStr !!}
            </div>
        </div>
    @endforeach
</div>
@section('query')
    {{ $query }}
@endsection
