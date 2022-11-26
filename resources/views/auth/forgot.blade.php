@extends('layout.app')

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
                        <div class="bg-white w-96 shadow-xl rounded p-5">
                            <h1 class="text-3xl font-medium">Восстановление пароля</h1>

                            <form class="space-y-5 mt-5" action="{{ route('forgot_process') }}" method="POST">
                                @csrf

                                <input name="email" type="text" class="single-input mt-3" placeholder="Email"/>
                                @error('email')
                                    <p class="danger">{{ $message }}</p>
                                @enderror
                                @if (!empty($status = $_GET['status'] ?? '') && $status == 'success')
                                    <p class="success">Новый пароль выслан на указанный адрес</p>
                                @endif

                                <div>
                                    <a href="{{ route('login') }}" class="genric-btn auth-link mt-2">Вспомнил пароль?</a>
                                </div>
                                <button type="submit" class="genric-btn custom mt-2">
                                    Восстановить пароль
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
