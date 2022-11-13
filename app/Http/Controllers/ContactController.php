<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contacts.index');
    }

    public function sendContactForm(ContactFormRequest $request)
    {
        Mail::to(env('MAIL_USERNAME'))
            ->send(new ContactForm($request->validated()));

        return redirect(route('contacts'));
    }
}
