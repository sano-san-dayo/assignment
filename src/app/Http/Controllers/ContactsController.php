<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class ContactsController extends Controller
{
    /* お問い合わせ入力 */
    public function index() {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
    
    /* お問い合わせ入力画面で「確認画面」ボタン押下 */
    public function confirm(Request $request) {
        /* 入力データ抽出 */
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        /* 全角空白を間に入れて、姓と名を結合 */
        $contact['name'] = "{$contact['first_name']}　{$contact['last_name']}";
        /* 3分割されている電話番号を結合 */
        $contact['tel'] = "{$contact['tel1']}{$contact['tel2']}{$contact['tel3']}";
        return view('confirm', compact('contact'));
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
