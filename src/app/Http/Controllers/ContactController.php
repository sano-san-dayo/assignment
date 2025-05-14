<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class ContactController extends Controller
{
    /* お問い合わせ入力 */
    public function index() {
        $categories = Category::all();
        return view('contact', compact('categories'));
    }
    
    /* お問い合わせ入力画面で「確認画面」ボタン押下 */
    public function contact(ContactRequest $request) {
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
        }
    }

    /* ログイン */
    public function login(LoginRequest $request) {
        $categories = Category::all();
        $contacts = Contact::Paginate(7);

        return view('admin', compact('categories', 'contacts'));
    }
}
