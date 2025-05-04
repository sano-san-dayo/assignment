@extends ('layouts.app')

@section ('css')
@endsection

@section ('content')
<div>
    <div>
        <h3>Register</h3>
    </div>
    <div>
        <table>
            <tr>
                <th>お名前</th>
            </tr>
            <tr>
                <td>
                    <form action="">
                        <input type="text" placeholder="例: 山田　太郎">
                    </form>
                </td>
            </tr>
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
        <button>登録</button>
    </div>
</div>
@endsection