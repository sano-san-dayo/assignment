@extends ('layouts.app')

@section ('css')
@endsection

@section ('content')
<div>
    <div>
        <h3>Admin</h3>
    </div>
    <div>
        <form action="">
            <input type="text" placeholder="名前やメールアドレスを入力してください">
        </form>
        <select name="" id="">性別</select>
        <select name="" id="">お問い合わせの種類</select>
        <input type="date">
        <button>検索</button>
        <button>リセット</button>
    </div>
    <div>
        <button>エクスポート</button>
    </div>
    <div>
        <table>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
            </tr>
            <tr>
                <td>山田　太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td>
                    <button>詳細</button>
                </td>
            </tr>
            <tr>
                <td>山田　太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td>
                    <button>詳細</button>
                </td>
            </tr>
            <tr>
                <td>山田　太郎</td>
                <td>男性</td>
                <td>test@example.com</td>
                <td>商品の交換について</td>
                <td>
                    <button>詳細</button>
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection
