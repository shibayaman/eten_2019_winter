@extends('layouts/app')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<div class="container">
<h2 class="title is-2">作品登録確認</h2>
    <div class="columns is-desktop">
        <div class="column is-harf">
            <figure class="image is-16by9">
                <img src="{{ $project['image']->getPathname()) }}" alt="作品の画像">
            </figure>
        </div>
        <div class="column">
            <table class="table">
                <tr class="columns">
                    <th class="column is-one-fifth">作品コード</th>
                    <td class="column"></td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">作品名</th>
                    <td class="column">{{ $project['title'] }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">チーム名</th>
                    <td class="column">{{ $project['team'] }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">代表者名</th>
                    <td class="column">{{ $project['represent'] }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">メンバー</th>
                    <td class="column">{{ implode(',',$project['member']) }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">ジャンル</th>
                    <td class="column">{{ $project['genre'] }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">作品説明</th>
                    <td class="column">{{ $project['detail'] }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">キャッチコピー</th>
                    <td class="column">{{ $project['catch_copy'] }}</td>
                </tr>
                <tr class="columns">
                    <th class="column is-one-fifth">制作期間</th>
                    <td class="column">{{ $project['period'] }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="buttons is-right">
        <form action="{{ Route('') }}" method="post">
            @csrf
            <input type="hidden" name="title"  value="{{ $project['title'] }}">
            <input type="hidden" name="catch_copy"  value="{{ $project['catch_copy'] }}">
            <input type="hidden" name="detail"  value="{{ $project['detail'] }}">
            <input type="hidden" name="image"  value="{{ $project['image'] }}">
            <input type="hidden" name="period"  value="{{ $project['period'] }}">
            <input type="hidden" name="represent"  value="{{ $project['represent'] }}">
            <input type="hidden" name="team"  value="{{ $project['team'] }}">
            <input type="hidden" name="member"  value="{{ $project['member'] }}">
            <input type="hidden" name="genre"  value="{{ $project['genre'] }}">

            <button type="submit" class="button is-info is-outlined is-rounded is-medium">登録する</button>
        </form>
        <button type="button" onclick="history.back()" class="button is-rounded is-medium">戻る</button>
    </div>
</div>
@endsection