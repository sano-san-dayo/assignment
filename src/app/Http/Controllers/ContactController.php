<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;

class ContactController extends Controller
{
    /* お問い合わせ入力 */
    public function index() {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
    
    /* お問い合わせ入力画面で「確認画面」ボタン押下 */
    public function contact(Request $request) {
        /* 入力データ抽出 */
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        /* お問い合わせの種類 */
        $categories = Category::all();

        return view('confirm', compact('contact', 'categories'));
    }

    /* 確認画面 */
    public function confirm(Request $request) {
        switch ($request['action']) {
            case 'submit':
                /* 登録作成 */
                $tel = $request->only(['tel1', 'tel2', 'tel3']);
                $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'address', 'building', 'category_id', 'detail']);
                $contact['tel'] = "{$tel['tel1']}{$tel['tel2']}{$tel['tel3']}";
                
                /* データ登録 */
                Contact::create($contact);

                /* サンクスページ */
                return view('/thanks');
                break;
            case 'back':
                /* 入力画面へ戻る */
                return redirect('/')->withInput();
                break;
            default:
                /* エラー */
                dd($request);
        }
    }

    /* 管理画面 */
    public function admin() {
        return view('admin');
    }

    /* ユーザ登録画面 */
    public function showregister() {

        return view('register');
    }

    /* ユーザ登録 */
    public function register(Request $request) {
        /* 登録データ抽出 */
        $user = $request->only(['name', 'email', 'password']);
        /* 登録 */
        User::create($user);
    
        return view('register');
    }

    /* ログイン */
    public function login() {
        return view('login');
    }
}
