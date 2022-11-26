@extends('layout.admin')

@section('title', isset($post) ? "Редактировать заметку '{$post->title}'" : 'Добавить новую заметку')
@section('description', isset($post) ? 'Редактировать заметку' : 'Добавить новую заметку')

@section('content')
    <div class="col-lg-9 order-lg-2">
        <div class="apply_job_form white-bg admin_posts_add_create">
            <h4>@if(isset($post))
                    Редактировать заметку {{ $post->title }}
                @else
                    Добавить новую
                @endif</h4>
            <form enctype="multipart/form-data"
                  action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}"
                  method="POST">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="col-md-12">
                    <div class="switch-wrap d-flex justify-content-end align-items-center">
                        <p class="mr-3 mb-0" id="text_is_published">{{ isset($post) && $post->is_published ? 'Опубликовано' : 'Опубликовать' }}</p>
                        <div class="confirm-switch">
                            <input name="is_published" type="checkbox" id="is_published" @if(isset($post) && $post->is_published) checked @endif>
                            <label for="is_published"></label>
                        </div>
                        @error('is_published')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_field">
                            <select name="category_id" class="wide mb-3 @error('category_id') border-danger @enderror">
                                @if (!isset($post))
                                <option data-display="Выберите категорию">Выберите категорию</option>
                                @endif
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if(isset($post) && $post->category_id == $category->id) selected @endif>
                                        {{ ($category->level > 1 ? str_repeat(' - ', $category->level - 1) . '   ' : '') . $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <p class="danger">{{ $message . ' Вероятно, Вы не выбрали категорию' }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="title" type="text" placeholder="Название" @error('title') class="border-danger"
                                   @enderror
                                   @if (isset($post)) value="{{ $post->title }}" @endif>
                        </div>
                        @error('title')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="code" type="text" placeholder="Код" @error('code') class="border-danger"
                                   @enderror
                                   @if (isset($post)) value="{{ $post->code }}" @endif>
                        </div>
                        @error('code')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="preview_text" type="text" placeholder="Описание"
                                   @error('preview_text') class="border-danger" @enderror
                                   @if (isset($post)) value="{{ $post->preview_text }}" @endif>
                        </div>
                        @error('preview_text')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (isset($post) && $post->thumbnail)
                        <div class="col-md-12 feature-img">
                            <img class="img-fluid" src="/storage/posts/{{ $post->thumbnail }}">
                        </div>
                    @endif
                    <div class="col-md-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button type="button" id="inputGroupFileAddon03"><i class="fa fa-cloud-upload"
                                                                                    aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="custom-file">
                                <input name="thumbnail" type="file"
                                       class="custom-file-input @error('thumbnail') border-danger @enderror"
                                       id="inputGroupFile03"
                                       aria-describedby="inputGroupFileAddon03">
                                <label class="custom-file-label" for="inputGroupFile03">Добавить картинку</label>
                            </div>
                            @error('thumbnail')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <textarea name="detail_text" id="" cols="30" rows="10" placeholder="Текст"
                                       class="editor @error('detail_text') border-danger @enderror"
                            >@if (isset($post)){{ $post->detail_text }}@endif</textarea>
                        </div>
                        @error('detail_text')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="submit_btn">
                            <button class="boxed-btn3 w-100" type="submit">Сохранить</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
<script src="/custom/js/ajax/post_add_edit.js?{{ time() }}"></script>
<script src="/custom/js/editor/ckeditor.js?{{ time() }}"></script>
<script src="/custom/js/editor/ckeditorStart.js?{{ time() }}"></script>
@endsection
@section('css')
<link rel="stylesheet" type="text/css" href="/custom/css/editor.css?{{ time() }}">
@endsection
