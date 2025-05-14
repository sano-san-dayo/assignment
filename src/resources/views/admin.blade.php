@extends ('layouts.app')

@section ('css')
<link rel="stylesheet" href="http://bootstrap3.cyberlab.info/bootstrap/dist/css/bootstrap.css">
<link rel="stylesheet" href="css/admin.css">
@endsection

@section ('button')
<div>
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <div class="header__button">
            <button type="header__button--submit">logout</button>
        </div>
    </form>
</div>
@endsection

@section ('content')
<div class="admin-form__content">
    <div class="admin-form__heading">
        <a>Admin</a>
    </div>
    <form class="admin__form-search" action="" method="post">
        @csrf
        <div class="search-form">
            <input class="search-form__input-freeword" type="text" name="free_word" placeholder="名前やメールアドレスを入力してください" value="{{ old('free_word') }}">
            <select class="search-form__select-gender"name="gender" onchange="changeColor(this) value="{{ old('gender') }}">
                <option value="0" disabled selected>性別</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="1">その他</option>
            </select>
            <select class="search-form__select-category" name="category_id" onchange="changeColor(this) value="{{ old('category_id') }}">
                <option value="0" disabled selected>お問い合わせの種類</option>
                @foreach ($categories as $category)
                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input class="search-form__input-date" type="date" name="date" onchange="changeColor(this) value="{{ old('date') }}">
            <input class="search-form__button-submit"type="submit" name="search-btn" value="検索">
            <input class="search-form__button-reset" type="submit" name="reset-btn" value="リセット">
        </div>
    </form>
    <!-- <div>
        <button>エクスポート</button>
    </div> -->
    {{ $contacts->appends(request()->input())->links() }}
    <table class="admin-table">
        <div class="table__header">

        <tr>
            <th>お名前</th>
            <th>性別</th>
            <th>メールアドレス</th>
            <th>お問い合わせの種類</th>
            <th></th> <!-- ボタン用 -->
        </tr>
        </div>
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
            <td>{{ $contact['category']['content'] }}</td>
            <td>
                <button type="button" class="btn" data-toggle="modal" data-target="#contactModal" data-recipient="{{ $contact }}">
                    削除
                </button>

            </td>
        </tr>

        @endforeach
    </table>
</div>

<!-- モーダル -->
<div class="modal" id="contactModal" tabindex="-1">
    <form action="" method="post">
        @csrf
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>

                <table class="modal_table">
                    <tr>
                        <th>お名前</th>
                        <td>
                            <span class="replace-first-name"></span>
                            <span>　</span>
                            <span class="replace-last-name"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <span class="replace-gender"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>
                            <span class="replace-email"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>
                            <span class="replace-tel"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>
                            <span class="replace-address"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>建物</th>
                        <td>
                            <span class="replace-building"></span>
                        </td>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td><span class="replace-category"></span></td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td><textarea class="replace-detail" readonly="readonly"></textarea></td>
                    </tr>
                </table>
                <div class="modal-footer">
                    <input id="delete-id" type="hidden" name="id" value="-1">
                    <button class="delete-form__button-submit" type="submit" name="delete-btn">削除</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script src="http://bootstrap3.cyberlab.info/jquery/jquery-1.11.2.min.js"></script>
<script src="http://bootstrap3.cyberlab.info/bootstrap/dist/js/bootstrap.min.js"></script>
<script>
	$('#contactModal').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget);
        // モーダルに表示する値を設定
		var recipient = button.data('recipient');
        var id = recipient['id'];
        var first_name = recipient['first_name'];
        var last_name = recipient['last_name'];
        var gender = recipient['gender'];
        var email = recipient['email'];
        var tel = recipient['tel'];
        var address = recipient['address'];
        var building = recipient['building'];
        var category = recipient['category']['content'];
        var detail = recipient['detail'];
		var modal = $(this);

        // 建物が未入力(null)の場合、空文字に置換
        if (building == null) {
            building = "";
        }

        // 性別をコードから文字列に変換
        if (gender == '1') {
            var genderString = '男性';
        } else if (gender == '2') {
            var genderString = '女性';
        } else if (gender == '3') {
            var genderString = 'その他';
        }

        // 取得知多値をモーダル表示用HTMLへ設定
		modal.find('.replace-id').text(id);
		modal.find('.replace-first-name').text(first_name);
		modal.find('.replace-last-name').text(last_name);
		modal.find('.replace-gender').text(genderString);
		modal.find('.replace-email').text(email);
		modal.find('.replace-tel').text(tel);
		modal.find('.replace-address').text(address);
		modal.find('.replace-building').text(building);
		modal.find('.replace-category').text(category);
		modal.find('.replace-detail').text(detail);

        const newbutton = document.getElementById("delete-id");
        newbutton.setAttribute("value", id);
	});
</script>
@endsection
