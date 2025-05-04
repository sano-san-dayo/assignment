@extends ('layouts.app')

@section ('css')
@endsection

@section ('content')
<div>
    <div>
        <h3>Login</h3>
    </div>
    <div>
        <table>
            <tr>
                <th>メールアドレス</th>
            </tr>
            <tr>
                <td>
                    <form action="">
                        <input type="text" placeholder="例: test@example.com">
                    </form>
                </td>
            </tr>
            <tr>
                <th>パスワード</th>
            </tr>
            <tr>
                <td>
                    <input type="text" placeholder="例: coachtech1106">
                </td>
            </tr>
        </table>
        <button>ログイン</button>
    </div>
</div>
@endsection