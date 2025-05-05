@extends ('layouts.app')

@section ('css')
@endsection

@section ('content')
<div>
    <form class="form" action="/confirm" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}">
                    <input type="text" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}">
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__label-title">
                <span class="form__label--item">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--radio">
                    <input type="radio" name="gender" id="male" value="1" checked>
                    <label for="male">男性</label>
                    <input type="radio" name="gender" id="female" value="2">
                    <label for="female">女性</label>
                    <input type="radio" name="gender" id="other" value="3">
                    <label for="other">その他</label>
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__label-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__lavel-title">
                <span class="form__label--item">電話番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="test" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                    <input type="test" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    <input type="test" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__lavel-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="test" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__lavel-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="test" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__lavel-title">
                <span class="form__label--item">お問い合わせの種類</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__select">
                    <select name="category_id" placeholder="選択してください">
                        @foreach ($categories as $category)
                        <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__lavel-title">
                <span class="form__label--item">お問い合わせ内容</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <textarea type="text" name="detail" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                </div>
                <div class="form__error">
                    <!-- バリデーション実装後に追記 -->
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection