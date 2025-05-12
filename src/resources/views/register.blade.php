@extends ('layouts.app')
@section ('css')
<link rel="stylesheet" href="css/register.css">
@endsection

@section ('button')
<div>
    <form method="post">
        @csrf
        <div class="header__button">
            <button class="header__button--submit" type="button" onclick="location.href='/login'">login</button>
        </div>            
    </form>
</div>
@endsection

@section ('content')
<div class="register-form__content">
    <div class="register-form__heading">
        <a>Register</a>
    </div>
    <form class="register__form" action="/register" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__group--input" type="text" name="name" placeholder="例: 山田　太郎" value="{{ old('name') }}">
                </div>
                <div class="form_error">
                    @error ('name')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form_group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__group--input" type="text" name="email" placeholder="例: text@example.com" value="{{ old('email') }}">
                </div>
                <div class="form_error">
                    @error ('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form_group-title">
                <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input class="form__group--input" type="password" name="password" placeholder="例: coachtech1106">
                </div>
                <div class="form_error">
                    @error ('password')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__button">
                <button class="form__button-submit" type="submit">登録</button>
            </div>
        </div>
    </form>
</div>
@endsection