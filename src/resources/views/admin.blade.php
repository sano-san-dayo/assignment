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
            <div>
                <input type="text" placeholder="名前やメールアドレスを入力してください">
            </div>
            <div>
                <select name="gender">
                    <option value="0" disabled selected>性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="1">その他</option>
                </select>
            </div>
            <div>
                <select name="category_id">
                    <option value="0" disabled selected>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="date">
            </div>
            <div>
                <button>検索</button>
                <button>リセット</button>
            </div>
        </form>
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
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ "{$contact['first_name']}　{$contact['last_name']}" }}</td>
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
                <td>{{ $contact['email'] }}</td>
                <td>{{ $categories[$contact['category_id']]['content'] }}</td>
                <td>
                    <button type="button" class="form-btn" data-toggle="modal" data-target="#exampleModalCenter">詳細</button>
                </td>
                <td>
                    <button wire:click=""></button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<script src="{{ asset('/js/main.js') }}"></script>
@endsection
