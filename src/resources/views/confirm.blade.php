@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="contact-form__content">
    <div class="contact-form__heading">
        <h2>内容確認</h2>
    </div>
    <form class="form" action="/contacts" method="POST">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content-fullname">
                <input class="family-name" type="text" name="family-name" id="family-name" value="{{ $contact['family-name'] }}">
                <input class="given-name" type="text" name="given-name" value="{{ $contact['given-name'] }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">性別</span>
            </div>
            <div class="form__group-content">
                <input class="gender" type="text" name="gender" value="{{ $contact['gender'] }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <input class="email" type="text" name="email" value="{{ $contact['email'] }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">郵便番号</span>
            </div>
            <div class="form__group-content">
                <input class="postcode" type="text" name="postcode" value="{{ $contact['postcode'] }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">住所</span>
            </div>
            <div class="form__group-content">
                <input class="address" type="text" name="address" value="{{ $contact['address'] }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">建物名</span>
            </div>
            <div class="form__group-content">
                <input class="building_name" type="text" name="building_name" value="{{ $contact['building_name'] }}">
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">ご意見</span>
            </div>
            <div class="form__group-content">
                <input class="opinion" type="text" name="opinion" value="{{ $contact['opinion'] }}">
            </div>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
        </div>
        <a href="/" class="edit">修正する</a>
    </form>
</div>
@endsection