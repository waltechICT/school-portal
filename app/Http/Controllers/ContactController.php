<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        if (auth()->check() && !auth()->user()->hasVerifiedEmail()) {
            return redirect()->route('verification.notice');
        }

        return view('contact');
    }
}
