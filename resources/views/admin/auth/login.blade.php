@extends('layout.app')

@section('title', 'Авторизация')

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-8 col-sm-12">
                    <div class="h-screen bg-white flex flex-col space-y-10 justify-center items-center">
                        <div class="bg-white w-96 shadow-xl rounded p-5">
                            <h1 class="text-3xl font-medium">Вход</h1>

                            <form class="space-y-5 mt-5" action="{{ route('admin.login_process') }}" method="POST">
                                @csrf
                                <input name="email" type="text" class="single-input @error('email') border-danger @enderror" placeholder="Email"/>
                                @error('email')
                                <p class="danger">{{ $message }}</p>
                                @enderror

                                <input name="password" type="password" class="single-input mt-3 @error('password') border-danger @enderror" placeholder="Пароль"/>
                                @error('password')
                                <p class="danger">{{ $message }}</p>
                                @enderror

                                <button type="submit" class="genric-btn custom mt-2">
                                    Войти
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
