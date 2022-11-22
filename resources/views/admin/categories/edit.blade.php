@extends('layout.admin')

@section('title', isset($category) ? "Редактировать раздел '{$category->title}'" : 'Добавить новую раздел')
@section('description', isset($category) ? 'Редактировать раздел' : 'Добавить новую раздел')

@section('content')
    <div class="col-lg-9 order-lg-2">
        <div class="apply_job_form white-bg admin_posts_add_create">
            <h4>@if(isset($category))
                    Редактировать раздел {{ $category->title }}
                @else
                    Добавить новый раздел
                @endif</h4>
            <form enctype="multipart/form-data"
                  action="{{ isset($category) ? route('admin.categories.update', $category->id) : route('admin.categories.store') }}"
                  method="POST">
                @csrf
                @if (isset($category))
                    @method('PUT')
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="input_field">
                            <select name="parent_id" class="wide mb-3 @error('parent_id') border-danger @enderror">
{{--                                @if (!isset($category) || !$category->parent_id)--}}
                                <option data-display="Выберите категорию" value="">Выберите категорию</option>
{{--                                @endif--}}
                                @foreach($categories as $categoryItem)
                                    <option value="{{ $categoryItem->id }}"
                                            @if(isset($category) && $category->parent_id == $categoryItem->id) selected @endif>
                                        {{ ($categoryItem->level > 1 ? str_repeat(' - ', $categoryItem->level - 1) . '   ' : '') . $categoryItem->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('parent_id')
                            <p class="danger">{{ $message . ' Вероятно, Вы не выбрали категорию' }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="name" type="text" placeholder="Название" @error('name') class="border-danger"
                                   @enderror
                                   @if (isset($category)) value="{{ $category->name }}" @endif>
                        </div>
                        @error('name')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="title" type="text" placeholder="Заголовок" @error('title') class="border-danger"
                                   @enderror
                                   @if (isset($category)) value="{{ $category->title }}" @endif>
                        </div>
                        @error('title')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <input name="code" type="text" placeholder="Код" @error('code') class="border-danger"
                                   @enderror
                                   @if (isset($category)) value="{{ $category->code }}" @endif>
                        </div>
                        @error('code')
                        <p class="danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col-md-12">
                        <div class="input_field">
                            <textarea name="description" id="" cols="30" rows="10" placeholder="Описание"
                                      @error('description') class="border-danger" @enderror
                            >@if (isset($category)){{ $category->description }}@endif</textarea>
                        </div>
                        @error('description')
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

