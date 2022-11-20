@extends('layout.admin')

@section('title', isset($post) ? "Редактировать заметку '{$post->title}'" : 'Добавить новую заметку')
@section('description', isset($post) ? 'Редактировать заметку' : 'Добавить новую заметку')

@section('content')
    <div class="col-lg-9 order-lg-2">
        <div class="apply_job_form white-bg">
            <h4>@if(isset($post))Редактировать заметку {{ $post->title }}@elseДобавить новую@endif</h4>
            <form enctype="multipart/form-data" action="{{ isset($post) ? route('admin.posts.update', $post->id) : route('admin.posts.store') }}" method="POST">
                @csrf
                @if (isset($post))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="category_id" type="text" placeholder="Категория" @error('category_id') class="border-danger" @enderror
                            @if (isset($post)) value="{{ $post->category_id }}" @endif>
                        </div>
                        @error('category_id')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="title" type="text" placeholder="Название" @error('title') class="border-danger" @enderror
                            @if (isset($post)) value="{{ $post->title }}" @endif>
                        </div>
                        @error('title')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="code" type="text" placeholder="Код" @error('code') class="border-danger" @enderror
                            @if (isset($post)) value="{{ $post->code }}" @endif>
                        </div>
                        @error('code')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="preview_text" type="text" placeholder="Описание" @error('preview_text') class="border-danger" @enderror
                            @if (isset($post)) value="{{ $post->preview_text }}" @endif>
                        </div>
                        @error('preview_text')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    @if (isset($post) && $post->thumbnail)
                    <div class="col-md-12">
                        <img src="/storage/posts/{{ $post->thumbnail }}">
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
                                <input name="thumbnail" type="file" class="custom-file-input @error('preview_text') border-danger @enderror" id="inputGroupFile03"
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
                            <textarea name="detail_text" id="" cols="30" rows="10" placeholder="Текст" @error('detail_text') class="border-danger" @enderror
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
