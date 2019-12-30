@extends('layouts/app')

@section('title', 'API発行完了')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<article class="message is-info">
    <div class="message-header">
        <p>新しいAPIトークン</p>
    </div>
    <div class="message-body">
        {{ $token }}
    </div>
</article>
@endsection