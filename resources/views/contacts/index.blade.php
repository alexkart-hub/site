@extends('layout.app')

@section('content')
    @include('contacts.header')
    <div class="row pt-5">
        <div class="col-12">
            <h1 class="contact-title">Контактная форма</h1>
        </div>
        <div class="col-lg-8">
            <form class="form-contact contact_form" action="{{ route('contact_form_process') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">

                            <textarea class="form-control w-100 @error('text') border-danger @enderror" name="text" id="message" cols="30" rows="9"
                                      onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите сообщение'"
                                      placeholder='Введите сообщение'></textarea>
                            @error('text')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control @error('name') border-danger @enderror" name="name" id="name" type="text"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите Ваше имя'"
                                   placeholder='Введите Ваше имя'>
                            @error('name')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input class="form-control @error('email') border-danger @enderror" name="email" id="email" type="email"
                                   onfocus="this.placeholder = ''" onblur="this.placeholder = 'Введите Ваш email'"
                                   placeholder='Введите Ваш email'>
                            @error('email')
                            <p class="danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <button type="submit" class="button button-contactForm btn_4 boxed-btn">Отправить сообщение</button>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            <div class="media contact-info">
                <span class="contact-info__icon"><i class="ti-email"></i></span>
                <div class="media-body">
                    <h3>{{ env('MAIL_USERNAME') }}</h3>
                    <p>Если у Вас возникли вопросы, воспользуйтесь контактной формой. Возможно, я даже отвечу.</p>
                </div>
            </div>
        </div>
    </div>
    @include('contacts.footer')
@endsection
