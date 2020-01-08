@extends('layouts/app')

@section('title', '+E展・作品登録確認')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<div class="container is-fluid">
<h2 class="title is-2">作品登録確認</h2>
<div class="columns is-desktop">
    <div class="column is-two-fifths">
        <figure class="image is-16by9">
            <img src="https://bulma.io/images/placeholders/640x360.png" alt="作品画像">
        </figure>
    </div>
    <div class="column">
        <table class="table">
            <tr class="columns">
                <th class="column is-one-fifth">作品コード</th><td class="column">W01</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">作品名</th><td class="column">作品登録システム</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">チーム名</th><td class="column">team-E展</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">代表者名</th><td class="column">ライオン</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">メンバー</th><td class="column">ネコ,クマ,サル</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">作品説明</th>
                <td class="column">E展の作品を管理するシステムです！PHP(Laravel),HTML,CSS(Bulma),JavaScript(jQuery)で作りました！
                    作品説明-作品説明-作品説明--作品説明--作品説明--作品説明--作品説明--作品説明--作品説明--作品説明--作品説明--作品説明--作品説明--作品説明</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">キャッチコピー</th><td class="column">キャッチコピーキャッチコピーキャッチコピーキャッチコピーキャッチコピー</td>
            </tr>
            <tr class="columns">
                <th class="column is-one-fifth">制作期間</th><td class="column">2か月</td>
            </tr>
        </table>
    </div>
</div>
<div class="buttons is-right">
    <form action="" method="post">
        @csrf
        <input type="hidden" name="title"  value="">
        <input type="hidden" name="catch_copy"  value="">
        <input type="hidden" name="detail"  value="">
        <input type="hidden" name="image"  value="">
        <input type="hidden" name="period"  value="">
        <input type="hidden" name="represent"  value="">
        <input type="hidden" name="team"  value="">
        <input type="hidden" name="member"  value="">
        <input type="hidden" name="genre"  value="">

        <input type="submit" value="登録する" class="button is-info is-outlined is-rounded is-medium">
    </form>
    <button class="button is-rounded is-medium">戻る</button>

  </div>

    {{-- <div class="columns">
        <div class="column is-harf"></div>

        <div class="column" style="text-align:right;">
            <button class="button is-outlined is-medium is-rounded">戻る</button>
        </div>
        <div class="column" style="text-align:right;">
            
        </div>        --}}
    </div>

</div>
@endsection