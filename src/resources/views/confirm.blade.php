@extends ('layouts.app')

@section ('css')
<link rel="stylesheet" href="css/confirm.css">
@endsection

@section ('content')
<div class="confirm-form__content">
    <div class="confirm-form__heading">
        <a>Confirm</a>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <table class="confirm-table">
            <tr>
                <th>お名前</th>
                <td>{{ "{$contact['first_name']}　{$contact['last_name']}" }}</td>
                <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}">
                <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}">
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <?php
                        if ($contact['gender'] == '1') {
                            echo '男性';
                        } else if ($contact['gender'] == '2') {
                            echo '女性';
                        } else if ($contact['gender'] == '3') {
                            echo 'その他';
                        }
                    ?>
                </td>
                <input type="hidden" name="gender" value="{{ $contact['gender'] }}">
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>test@example.com</td>
                <input type="hidden" name="email" value="{{ $contact['email'] }}">
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ "{$contact['tel1']}{$contact['tel2']}{$contact['tel3']}" }}</td>
                <input type="hidden" name="tel1" value="{{ $contact['tel1'] }}">
                <input type="hidden" name="tel2" value="{{ $contact['tel2'] }}">
                <input type="hidden" name="tel3" value="{{ $contact['tel3'] }}">
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $contact['address'] }}</td>
                <input type="hidden" name="address" value="{{ $contact['address'] }}">
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $contact['building'] }}</td>
                <input type="hidden" name="building" value="{{ $contact['building'] }}">
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $categories[$contact['category_id']]['content'] }}</td>
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{!! nl2br(e($contact['detail'])) !!}</td>
                <input type="hidden" name="detail" value="{{ $contact['detail'] }}">
            </tr>
        </table>
        <div class="form__button">
            <button class="form__button-submit" type="submit" name="action" value="submit">送信</button>
            <button class="form__button-back" type="submit" name="action" value="back">修正</button>
        </div>
    </form>
</div>
@endsection