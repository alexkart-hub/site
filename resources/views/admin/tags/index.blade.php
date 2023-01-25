@extends('layout.admin')

@section('title', "Тэги")
@section('description', "Тэги")

@section('content')
    <div class="col-lg-9   order-lg-2">
        <div class="recent_joblist_wrap">
            <div class="recent_joblist white-bg ">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h1>Теги</h1>
                    </div>
                    <div class="col-md-3">
                        <a href="{{ route('admin.tags.create') }}" class="boxed-btn3">Добавить</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="job_lists m-0">
            <div class="row">
                @foreach($tags as $tag)
                    <div class="col-lg-12 col-md-12">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                <div class="jobs_conetent">
                                    <h2>{{ $tag->name }}</h2>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now d-flex">

                                    <a href="{{ route('admin.tags.edit', $tag->id) }}"
                                       class="boxed-btn3">Редактировать</a>
                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="heart_mark" type="submit"><i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $tags->links('partials.pagination') }}
        </div>
    </div>
@endsection
