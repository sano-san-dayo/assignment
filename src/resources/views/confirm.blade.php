@extends ('layouts.app')

@section ('css')
@endsection

@section ('content')
<div>
    <form class="confirm-form" action="/thanks" method="post">
        @csrf
        <table class="confirm-table">
            <tr>
                <td>お名前</td>
                <td>{{ "{$contact['first_name']}　{$contact['last_name']}" }}</td>
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            </tr>
            <tr>
                <td>性別</td>
                <td>{{ $contact['gender'] }}</td>
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            </tr>
            <tr>
                <td>メールアドレス</td>
                <td>test@example.com</td>
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
            </tr>
            <tr>
                <td>電話番号</td>
                <td>{{ "{$contact['tel1']}{$contact['tel2']}{$contact['tel3']}" }}</td>
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
            </tr>
            <tr>
                <td>住所</td>
                <td>{{ $contact['address'] }}</td>
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
            </tr>
            <tr>
                <td>建物名</td>
                <td>{{ $contact['building'] }}</td>
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
            </tr>
            <tr>
                <td>お問い合わせの種類</td>
                <td>{{ $contact['category_id'] }}</td>
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            </tr>
            <tr>
                <td>お問い合わせ内容</td>
                <td>{{ $contact['detail'] }}</td>
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            </tr>
        </table>
        <div class="confirm-form__button">
            <button class="confirm-form__button-submit" type="submit" name="action" value="submit">送信</button>
            <button class="confirm-form__button-back" type="submit" name="action" value="back">修正</button>
        </div>
    </form>
</div>
@endsection