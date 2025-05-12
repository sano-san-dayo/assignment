@extends ('layouts.app')

@section ('css')
<link rel="stylesheet" href="css/login.css">
@endsection

@section ('button')
<div>
    <form method="post">
        @csrf
        <div class="header__button">
            <button class="header__button--submit" type="button" onclick="location.href='/register'">register</button>
        </div>            
    </form>
</div>
@endsection

@section ('content')
<div class="login-form__content">
    <div class="login-form__heading">
        <a>Login</a>
    </div>
    <form class="login__form" action="/login" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__group--input" type="email" name="email" placeholder="例: test@example.com">
                </div>
                <div class="form__error">
                    @error ('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__group--input" type="password" name="password" placeholder="例: coachtech1106">
                </div>
                <div class="form__error">
                    @error ('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__button">
                <button class="form__button-submit" type="submit">ログイン</button>
            </div>
        </div>
    </form>
</div>
@endsection