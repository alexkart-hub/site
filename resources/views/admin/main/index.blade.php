@extends('layout.admin')

@section('title', "Админка")
@section('description', "Админка")

@section('content')
    <div class="col-lg-9   order-lg-2">
        <div class="recent_joblist_wrap">
            <div class="recent_joblist white-bg ">
                <div class="row align-items-center">
                    <div class="col-md-12 text-center">
                        <h1>Админка</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <pre>
    @php
    print_r($result);
    @endphp
    </pre>
@endsection
