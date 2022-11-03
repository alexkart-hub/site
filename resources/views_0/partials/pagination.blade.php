<?php
$nav = $paginator->toArray();
$left = 2;
$right = 2;
?>
@if ($nav['last_page'] > 1)
    <nav aria-label="Page navigation example" >
        <ul class="pagination pl-0 justify-content-center">
            <li class="page-item{{ ($nav['current_page'] == 1) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $nav['path'] }}"><</a>
            </li>
            @if ($nav['current_page'] > $left && $nav['current_page'] < $nav['last_page'] - $right)
                    <?php $end_point = (($nav['current_page'] + $right) < $nav['last_page']) ? $nav['current_page'] + $right : $nav['last_page']; ?>
                @for ($i = $nav['current_page'] - $left; $i <= $end_point; $i++)
                    <li class="page-item{{ ($nav['current_page'] == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{$nav['path']}}{{ $i == 1 ? '' : '?page=' . $i}}">{{ $i }}</a>
                    </li>
                @endfor
            @elseif($nav['current_page'] <= $left)
                    <?php
                    $slice = 1 + $left - $nav['current_page'];
                    $end_point = ($nav['current_page'] + ($right + $slice)) < $nav['last_page'] ? $nav['current_page'] + ($right + $slice) : $nav['last_page'];
                    ?>
                @for ($i = 1; $i <= $end_point; $i++)
                    <li class="page-item{{ ($nav['current_page'] == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{$nav['path']}}{{ $i == 1 ? '' : '?page=' . $i}}">{{ $i }}</a>
                    </li>
                @endfor
            @else
                    <?php
                    $slice = $right - ($nav['last_page'] - $nav['current_page']);
                    ?>
                @for ($i = (($nav['current_page'] - ($left + $slice)) < 1)? 1 : $nav['current_page'] - ($left + $slice); $i <= $nav['last_page']; $i++)
                    <li class="page-item{{ ($nav['current_page'] == $i) ? ' active' : '' }}">
                        <a class="page-link" href="{{$nav['path']}}{{ $i == 1 ? '' : '?page=' . $i}}">{{ $i }}</a>
                    </li>
                @endfor
            @endif
            <li class="page-item{{ ($nav['current_page'] == $nav['last_page']) ? ' disabled' : '' }}">
                <a class="page-link" href="{{ $nav['last_page_url'] }}">></a>
            </li>
        </ul>
    </nav>
@endif
