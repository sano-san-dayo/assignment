<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AuthController extends Controller
{
    public function index() {
        return view('login');
    }

    public function admin() {
        $categories = Category::all();
        $contacts = Contact::all();
        return view('admin', compact('categories', 'contacts'));
    }
}
