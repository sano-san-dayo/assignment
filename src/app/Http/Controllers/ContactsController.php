<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index() {
        return view('contact');
    }

    public function confirm() {
        return view('confirm');
    }

    public function thanks() {
        return view('thanks');
    }

    public function admin() {
        return view('admin');
    }

    public function register() {
        return view('register');
    }

    public function login() {
        return view('login');
    }
}
