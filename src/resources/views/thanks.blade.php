@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks__content">
    <p>ご意見いただきありがとうございました。</p>
    <button class="form__button-submit" type="submit">トップページへ</button>
</div>
@endsection