
@extends('layouts/app')

@section('title', '認証')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<h1 class="title">作品登録ログイン画面</h1>
<a class="is-pulled-right" href="{{ route('admin.login') }}">管理者用ページへ</a>
<form action="{{ route('login') }}" method="post">
    @csrf
    <div class="field">
        <label class="label">作品コード</label>
        <div class="control">
            <input class="input" type="text" name="project_code" placeholder="トークン" value="{{old('project_code')}}">
        </div>
        <label class="label">APIトークン</label>
        <div class="control">
            <input class="input" type="text" name="password" placeholder="トークン" value="{{old('token')}}">
        </div>
        <div class="control">
            <input type="submit" class="button is-primary" value="認証">
        </div>
    </div>
    @if ($errors->any())
        @foreach ($errors->all() as $error) 
            <article class="message is-danger">
            <div class="message-header">
                <p>エラー</p>
            </div>
            <div class="message-body">
                {{$error}}
            </div>
            </article>
        @endforeach
    @endif
</form>
@endsection