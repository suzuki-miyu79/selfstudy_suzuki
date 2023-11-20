@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>お問い合わせ</h2>
    </div>
    <form class="form h-adr" action="/contacts/confirm" method="post">
        <span class="p-country-name" style="display:none;">Japan</span>
        @csrf
        <!-- お名前入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content--name">
                <div class="content__name--family-name">
                    <div class="form__input--name">
                        <input type="text" name="family-name" value="{{ old('family-name') }}">
                    </div>
                    <p>　例）山田</p>
                    <div class="form__error">
                        @error('family-name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="content__name--given-name">
                    <div class="form__input--name">
                        <input type="text" name="given-name" value="{{ old('given-name') }}">
                    </div>
                    <p>　例）太郎</p>
                    <div class="form__error">
                        @error('given-name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <!-- 性別入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item-gender">性別</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content--gender">
                <div class="content__gender-inner">
                    <div class="form__input--male">
                        <input type="radio" name="gender" id="male" value="男性" {{ old ('gender') == '男性' ? 'checked' : '' }} checked>
                        <label for="male">男性</label>
                    </div>
                    <div class="form__input--female">
                        <input type="radio" name="gender" id="female" value="女性" {{ old ('gender') == '女性' ? 'checked' : '' }}>
                        <label for="female">女性</label>
                    </div>
                </div>
                <div class="form__error--gender">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- メールアドレス入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old('email') }}">
                </div>
                <p>　例）test@example.com</p>
                <div class="form__error">
                    @error('email')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 郵便番号入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content--postcode">
                <div class="content__postcode">
                    <div class="postcode__icon">
                        <label for="postcode">〒</label>
                    </div>
                    <div class="content__postcode--text">
                        <div class="form__input--postcode">
                            <input type="text" class="p-postal-code" name="postcode" id="postcode" value="{{ old('postcode') }}">
                        </div>
                        <p>　例）123-4567</p>
                    </div>
                </div>
                <div class="form__error--postcode">
                    @error('postcode')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 住所入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text"  class="p-region p-locality p-street-address p-extended-address" name="address" value="{{ old('address') }}">
                </div>
                <p>　例）東京都渋谷区千駄ヶ谷1-2-3</p>
                <div class="form__error">
                    @error('address')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <!-- 建物名入力 -->
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="building_name" value="{{ old('building_name') }}">
                </div>
                <p>　例）千駄ヶ谷マンション101</p>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ご意見</span>
                <span class="form__label--required">※</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--textarea">
                    <textarea name="opinion">{{ old('opinion') }}</textarea>
                    <div class="form__error">
                        @error('opinion')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">確認</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var postcodeInput = document.querySelector('input[name="postcode"]');

        // 郵便番号入力フィールドに対してイベントリスナーを追加
        postcodeInput.addEventListener('input', function () {
            // 全角を半角に変換
            var convertedValue = toHalfWidth(this.value);
            // 変換した値をフォームにセット
            this.value = convertedValue;
        });

        // 全角を半角に変換する関数
        function toHalfWidth(value) {
            return value.replace(/[０-９]/g, function (s) {
                return String.fromCharCode(s.charCodeAt(0) - 0xFEE0);
            });
        }
    });
</script>
@endsection