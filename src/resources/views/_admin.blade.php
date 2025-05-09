@extends ('layouts.app')

@section ('css')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
@endsection

<style>
  svg.w-5.h-5 {
    /*paginateメソッドの矢印の大きさ調整のために追加*/
    width: 30px;
    height: 30px;
  }
</style>


@section ('button')
<div>
    <form method="post" action="{{ route('logout') }}">
        @csrf
        <button type="submit">logout</button>
    </form>
</div>
@endsection

@section ('content')
<div>
    <div>
        <h3>Admin</h3>
    </div>
    <div>
        <form action="" method="post">
            @csrf
            <div>
                <input type="text" name="free_word" placeholder="名前やメールアドレスを入力してください" value="{{ old('free_word') }}">
            </div>
            <div>
                <select name="gender" value="{{ old('gender') }}">
                    <option value="0" disabled selected>性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="1">その他</option>
                </select>
            </div>
            <div>
                <select name="category_id" value="{{ old('category_id') }}">
                    <option value="0" disabled selected>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <input type="date" name="date" value="{{ old('date') }}">
            </div>
            <div>
                <input type="submit" name="search-btn" value="検索">
            </div>
            <div>
                <input type="submit" name="reset-btn" value="リセット">
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
                    <input type="button" value="詳細" data-target="#modal1" class="btn">
                    <!-- モーダル -->
                    <div class="modal" id="modal1">
                        <form action="" method="post">
                            @csrf
                            <table>
                                <tr>
                                    <th>お名前</th>
                                    <td>{{ "{$contact['first_name']}　{$contact['last_name']}" }}</td>
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
                                </tr>
                                <tr>
                                    <th>メールアドレス</th>
                                    <td>{{ $contact['email'] }}</td>
                                </tr>
                                <tr>
                                    <th>電話番号</th>
                                    <td>{{ "{$contact['tel1']}{$contact['tel2']}{$contact['tel3']}" }}</td>
                                </tr>
                                <tr>
                                    <th>住所</th>
                                    <td>{{ $contact['address'] }}</td>
                                </tr>
                                <tr>
                                    <th>建物</th>
                                    <td>{{ $contact['building'] }}</td>
                                </tr>
                                <tr>
                                    <th>お問い合わせの種類</th>
                                    <td>{{ $categories[$contact['category_id']]['content'] }}</td>
                                </tr>
                                <tr>
                                    <th>お問い合わせ内容</th>
                                    <td>{!! nl2br(e($contact['detail'])) !!}</td>
                                </tr>
                                <tr>
                                    <input type="submit" name="delete-btn" value="削除">
                                </tr>
                            </table>
                            <input type="hidden" name="id" value="{{ $contact['id'] }}">
                        </form>
                    </div>
                 </td>
            </tr>
            @endforeach
        </table>
        {{ $contacts->links() }}
    </div>
</div>
<script>
    $(function(){
        $('.btn').on('click',function(){
            console.log(1);
            $($(this).data("target")).modal({});
        });
    });

    window.onload = function() {
        $('#SampleModal').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);//モーダルを呼び出すときに使われたボタンを取得
            var title = button.data('title');//data-titleの値を取得
            var url = button.data('url');//data-urlの値を取得
            var modal = $(this);//モーダルを取得

            //Ajaxの処理はここに
            //modal-bodyのpタグにtextメソッド内を表示
            modal.find('.modal-body p').eq(0).text("本当に"+title+"を削除しますか?");
            //formタグのaction属性にurlのデータ渡す
            modal.find('form').attr('action',url);
        });
    }
</script>
@endsection
