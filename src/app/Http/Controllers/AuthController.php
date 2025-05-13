<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AuthController extends Controller
{
    /* ログイン画面表示 */
    public function index() {
        return view('login');
    }

    /* 管理画面表示 */
    public function admin() {
        $categories = Category::all();
        /* $contacts = Contact::all(); */
        $contacts = Contact::Paginate(7);
        return view('admin', compact('categories', 'contacts'));
    }

    /* お問い合わせデータ削除 */
    public function submit(Request $request) {
        if ($request->has('search-btn')) {  /* 検索ボタン押下 */
            /* 検索項目値取得 */
            $free_word = $request->input('free_word');
            $gender = $request->input('gender');
            $category_id = $request->input('category_id');
            $date = $request->input('date');

            $query = Contact::query();

            /* 性別絞り込み */
            if (!empty($gender)) {
                $query->where('gender', $gender);
            }

            /* お問い合わせの種類絞り込み */
            if (!empty($category_id)) {
                $query->where('category_id', $category_id);
            }

            /* 日付の絞り込み */
            if (!empty($date)) {
                $query->whereDate('updated_at', $date);
            }

            /* キーワード絞り込み */
            if (!empty($free_word)) {
                $query->where(function ($query) use ($free_word) {
                    $query->where('first_name', 'like', "%{$free_word}%")
                        ->orWhere('last_name', 'like', "%{$free_word}%")
                        ->orWhere('email', 'like', "%{$free_word}%");
                });
            }

            // $contacts = $query->get();
            $contacts = $query->paginate(7);
        } elseif ($request->has('reset-btn')) {
            $contacts = Contact::Paginate(7);
        } elseif ($request->has('delete-btn')) {
            Contact::find($request->id)->delete();

            $contacts = Contact::Paginate(7);
        } else {
            $message = 'エラー';
            $contacts = Contact::Paginate(7);
        }

        $categories = Category::all();
        return view('admin', compact('categories', 'contacts'));
    }
}
