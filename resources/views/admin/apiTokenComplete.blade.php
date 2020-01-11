@extends('layouts/app')

@section('title', 'ユーザー作成完了')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
    <article class="message is-info">
    <div class="message-header">
        <p>新しいユーザのパスワード</p>
    </div>
    <div class="message-body">
        {{ $token }}
    </div>
</article>
@endsection