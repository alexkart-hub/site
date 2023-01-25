@extends('layout.admin')

@section('title', isset($tag) ? "Редактировать тег '{$tag->name}'" : 'Добавить новый тег')
@section('description', isset($tag) ? 'Редактировать тег' : 'Добавить новый тег')

@section('content')
    <div class="col-lg-9 order-lg-2">
        <div class="apply_job_form white-bg admin_posts_add_create">
            <h4>@if(isset($tag))
                    Редактировать тег {{ $tag->name }}
                @else
                    Добавить новый
                @endif</h4>
            <form enctype="multipart/form-data"
                  action="{{ isset($tag) ? route('admin.tags.update', $tag->id) : route('admin.tags.store') }}"
                  method="POST">
                @csrf
                @if (isset($tag))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_field">
                            <input id="name" name="name" type="text" placeholder="Название"  data-token="{{ csrf_token() }}" @error('name') class="border-danger"
                                   @enderror
                                   @if (isset($tag)) value="{{ $tag->name }}" @endif>
                        </div>
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input id="code" name="code" type="text" placeholder="Код" @error('code') class="border-danger"
                                   @enderror
                                   @if (isset($tag)) value="{{ $tag->code }}" @endif>
                        </div>
                        @error('code')
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
    <script src="/custom/js/ajax/translit.js?{{ time() }}"></script>
    <script src="/custom/js/ajax/tag_add_edit.js?{{ time() }}"></script>
@endsection
