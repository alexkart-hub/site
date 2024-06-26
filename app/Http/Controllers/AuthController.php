<?php

namespace App\Http\Controllers;

use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    static public $mappingTitle = [
        'login' => 'Авторизация',
        'register' => 'Регистрация',
        'forgot' => 'Восстановление пароля',
    ];

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string'],
            'password' => ['required']
        ]);
        if (auth('web')->attempt($data)) {
            return redirect($request->get('route') ?? route('home'));
        }
        return redirect(route('login'))
            ->withErrors(['email' => 'Пользователь не найден, либо данные введены неправильно']);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'string', 'unique:users,email'],
            'password' => ['required', 'confirmed']
        ]);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        if ($user) {
            auth('web')->login($user);
        }
        return redirect(route('home'));
    }

    public function logout()
    {
        auth('web')->logout();
        return redirect($_SERVER['HTTP_REFERER']);
    }

    public function forgot(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email', 'string', 'exists:users'],
        ]);
        $user = User::where(['email' => $data['email']])->first();
        $password = uniqid();
        $user->password = bcrypt($password);
        $user->save();
        Mail::to($user)->send(new ForgotPassword($password));
        return redirect(route('forgot', ['status' => 'success']));
    }

    static public function getTitle($name): string
    {
         return self::$mappingTitle[$name];
    }
}
