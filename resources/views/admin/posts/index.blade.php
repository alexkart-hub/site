@extends('layout.admin')

@section('title', "Заметки")
@section('description', "Заметки")

@section('content')
    <div class="col-lg-9   order-lg-2">
        <div class="recent_joblist_wrap">
            <div class="recent_joblist white-bg ">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Список заметок</h1>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.posts.create') }}" class="boxed-btn3">Добавить</a>
                    </div>
                    <div class="col-md-3">
                        <div class="serch_cat d-flex justify-content-end">
                            <select>
                                <option data-display="Most Recent">Most Recent</option>
                                <option value="1">Marketer</option>
                                <option value="2">Wordpress</option>
                                <option value="4">Designer</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="job_lists m-0">
            <div class="row">
                @foreach($posts as $post)
                    @php
                        $imgSrc = $post->thumbnail ? route('postImage', ['filename' => $post->thumbnail]) : "/assets/img/svg_icon/1.svg";
                    @endphp
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between @if(!$post->is_published) not-published @endif">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="thumb"@if($post->thumbnail) style="padding: 0" @endif>
                                    <img src="{{ $imgSrc }}" alt="{{ $post->title }}">
                                </div>
                                <div class="jobs_conetent">
                                    <a href="{{ route('post', ['postCode' => $post->code, 'categoryCode' => $post->category->code]) }}">
                                        <h2>{{ $post->title }}</h2></a>
                                    <div class="links_locat d-flex align-items-center">
                                        <div class="location">
                                            <p><i class="fa fa-map-marker"></i>{{ $post->category->name }}</p>
                                        </div>
                                        <div class="location">
                                            <p>
                                                <i class="fa fa-clock-o"></i>{{ \App\Models\Helper::getDate($post->updated_at) }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now d-flex">

                                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="boxed-btn3">Редактировать</a>
                                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="heart_mark" type="submit"><i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="date">
                                    <p>{{ \App\Models\Helper::getDate($post->created_at) }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $posts->links('partials.pagination') }}
        </div>
    </div>
@endsection
