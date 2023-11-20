@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/management.css') }}">
<script src="{{ asset('js/mouseover.js') }}"></script>
@endsection

@if(session('success'))
<div class="alert-success">
    {{ session('success') }}
</div>
@endif

@section('content')
<div class="management-form__content">
    <div class="management-form__heading">
        <h2>管理システム</h2>
    </div>
    <form action="{{ route('admin.Results.search') }}" method="GET" class="search-form">
        <div class="search-form__item-top">
            <div class="search-form__item">
                <!-- お名前検索 -->
                <div class="search-form__group">
                    <div class="search-form__label">
                        <span class="search-form__lavel--item search-form__lavel--item-fullname">お名前</span>
                    </div>
                    <div class="search-form__input">
                        <input type="text" name="fullname" value="{{ request('fullname') }}">
                    </div>
                </div>
                <!-- 性別検索 -->
                <div class="search-form__group">
                    <div class="search-form__label">
                        <span class="search-form__lavel--item search-form__lavel--item-gender">性別</span>
                    </div>
                    <div class="search-form__radio">
                        <input type="radio" id="all" name="gender" value="all" {{ request ('gender') == 'all' ? 'checked' : '' }} checked>
                        <label for="all">全て</label>
                    </div>
                    <div class="search-form__radio">
                        <input type="radio" id="male" name="gender" value="男性" {{ request ('gender') == '男性' ? 'checked' : '' }}>
                        <label for="male">男性</label>
                    </div>
                    <div class="search-form__radio">
                        <input type="radio" id="female" name="gender" value="女性" {{ request ('gender') == '女性' ? 'checked' : '' }}>
                        <label for="female">女性</label>
                    </div>
                </div>
            </div>
            <!-- 登録日検索 -->
            <div class="search-form__item">
                <div class="search-form__group">
                    <div class="search-form__label">
                        <span class="search-form__lavel--item search-form__lavel--item-date">登録日</span>
                    </div>
                    <div class="search-form__group-date">
                        <div class="search-form__input">
                            <input type="datetime-local" name="start-date" value="{{ request('start-date') }}">
                        </div>
                        <div class="search-form__label">
                            <span class="search-form__lavel--item search-form__lavel--item-period">~</span>
                        </div>
                        <div class="search-form__input">
                            <input type="datetime-local" name="end-date" value="{{ request('end-date') }}">
                        </div>
                    </div>
                </div>
            </div>
            <!-- メールアドレス検索 -->
            <div class="search-form__item">
                <div class="search-form__group">
                    <div class="search-form__label">
                        <span class="search-form__lavel--item search-form__lavel--item-email">メールアドレス</span>
                    </div>
                    <div class="search-form__input">
                        <input type="text" name="email" value="{{ request('email') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="search-form__item-bottom">
            <div class="form__button">
                <button class="form__button-submit" type="submit" name="search">検索</button>
            </div>
            <a href="/admin" class="form__reset">リセット</a>
        </div>
    </form>

    {{ $results->links('vendor.pagination.tailwind-admin') }}

    <!-- 検索結果 -->
    <div class="search-result__table">
        <table class="search-result__inner">
            <tr class="search-result__column">
                <th class="search-result__id">ID</th>
                <th class="search-result__name">お名前</th>
                <th class="search-result__gender">性別</th>
                <th class="search-result__email">メールアドレス</th>
                <th class="search-result__opinion">ご意見</th>
            </tr>
            @if(isset($results) && count($results) > 0)
            @foreach($results as $result)
            <tr class="search-result__row">
                <td class="search-result__item-id">
                    <p>{{ $result->id }}</p>
                </td>
                <td class="search-result__item-name">
                    <p>{{ $result->fullname }}</p>
                </td>
                <td class="search-result__item-gender">
                    <p>{{ $result->gender }}</p>
                </td>
                <td class="search-result__item-email">
                    <p>{{ $result->email }}</p>
                </td>
                <td class="search-result__item-opinion">
                    <p class="opinion-preview" data-full-opinion="{{ $result->opinion }}">{{ Str::limit($result->opinion, 25) }}@if (strlen($result->opinion) > 25)@endif</p>
                </td>
                <td class="search-result__item-button">
                    <form action="{{ route('admin.delete', $result->id) }}" method="POST" class="search-result__button">
                        @csrf
                        @method('delete')
                        <button class="search-result__button-submit" type="submit">
                            削除
                        </button>
                    </form>
                </td>
                @endforeach
                @else
                @foreach($allresults as $result)
            <tr class="search-result__row">
                <td class="search-result__item">
                    <p>{{ $result->id }}</p>
                </td>
                <td class="search-result__item">
                    <p>{{ $result->fullname }}</p>
                </td>
                <td class="search-result__item">
                    <p>{{ $result->gender }}</p>
                </td>
                <td class="search-result__item">
                    <p>{{ $result->email }}</p>
                </td>
                <td class="search-result__item">
                    <p class="opinion-preview" data-full-opinion="{{ $result->opinion }}">{{ Str::limit($result->opinion, 25) }}@if (strlen($result->opinion) > 25)@endif</p>
                </td>
                <td class="search-result__item">
                    <form action="{{ route('admin.delete', $result->id) }}" method="POST" class="search-result__button">
                        @csrf
                        @method('delete')
                        <button class="search-result__button-submit" type="submit">
                            削除
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection