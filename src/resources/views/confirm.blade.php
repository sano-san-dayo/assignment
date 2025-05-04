@extends ('layouts.app')

@section ('css')
@endsection

@section ('content')
<div>
    <table>
        <tr>
            <td>お名前</td>
            <td>{{ $contact['name'] }}</td>
        </tr>
        <tr>
            <td>性別</td>
            <td>{{ $contact['gender'] }}</td>
        </tr>
        <tr>
            <td>メールアドレス</td>
            <td>test@example.com</td>
        </tr>
        <tr>
            <td>電話番号</td>
            <td>{{ $contact['tel'] }}</td>
        </tr>
        <tr>
            <td>住所</td>
            <td>{{ $contact['address'] }}</td>
        </tr>
        <tr>
            <td>建物名</td>
            <td>{{ $contact['building'] }}</td>
        </tr>
        <tr>
            <td>お問い合わせの種類</td>
            <td>{{ $contact['category_id'] }}</td>
        </tr>
        <tr>
            <td>お問い合わせ内容</td>
            <td>{{ $contact['detail'] }}</td>
        </tr>
    </table>
    <div>
        <button>送信</button>
        <button>修正</button>
    </div>
</div>
@endsection