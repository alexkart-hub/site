@extends('layout.admin')

@section('title', "Разделы")
@section('description', "Разделы")

@section('content')
                <div class="admin_categories col-lg-9  order-lg-2">
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-12 text-center">
                                    <h1>Разделы</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recent_joblist_wrap">
                        <div class="recent_joblist white-bg ">
                            <div class="row align-items-center">
                                <div class="col-md-6">
                                    <h2>Дерево категорий</h2>
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('admin.categories.create') }}" class="boxed-btn3">Добавить</a>
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
                            @foreach($categories as $category)
                                @php
                                $width = 12 - $category->level + 1;
                                $offset = $category->level - 1;
                                $hNum = $category->level + 2;
                                @endphp
                            <div class="col-lg-{{ $width }} col-md-{{ $width }} offset-{{ $offset }}">
                                <div class="single_jobs white-bg d-flex justify-content-between">
                                    <div class="jobs_left d-flex align-items-center">
                                        <div class="jobs_conetent">
                                            <a href="{{ route('category', $category->code) }}"><h{{ $hNum }}>{{ $category->name }}</h{{ $hNum }}></a>
                                        </div>
                                    </div>
                                    <div class="jobs_right">
                                        <div class="apply_now d-flex">
                                            <a href="{{ route('admin.categories.edit', $category->id) }}" class="boxed-btn3">Редактировать</a>
                                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                            <button type="submit" class="heart_mark"><i class="fa-solid fa-xmark"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
@endsection
