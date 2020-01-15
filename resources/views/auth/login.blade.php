
@extends('layouts/app')

@section('title', '認証')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@endsection

@section('content')
<body>

<div class="field">
  <div class="column is-three-fifths is-offset-5">
      <h1 class="title">作品登録ログイン画面</h1>
  </div>
</div>
<hr>

<a class="is-pulled-right" href="{{ route('admin.login') }}">管理者用ページへ</a>

<form action="{{ route('login') }}" method="post">
    @csrf

    <div class="section column is-offset-3">


        <div class="field">
            <label class="label">作品コード</label>
            <div class="control">
                <input class="input column is-three-quarters" type="text" name="project_code" placeholder="作品コードを入力してください" value="{{old('project_code')}}">
            </div>
            <!-- @if ($errors->any())
                <p class="help is-danger">作品コードが入力されていません</p>
            @endif -->
        </div>

        <div class="field">
          <label class="label">パスワード</label>
          <div class="control">
              <input class="input column is-three-quarters" type="password" name="password" placeholder="パスワードを入力してください" value="{{old('token')}}">
          </div>
          <!-- @if ($errors->any())
              <p class="help is-danger">パスワードが入力されていません</p>
          @endif -->
        </div>

        <div class="field">
          <div class="control">
              <input type="submit" class="button is-outlined is-rounded is-info is-primary" value="ログイン">
          </div>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <article class="message is-danger column is-three-quarters">
                <div class="message-header">
                    <p>エラー</p>
                </div>
                <div class="message-body">
                    {{$error}}
                </div>
                </article>
            @endforeach
        @endif

    </div>


  </div>
</form>
@endsection

</body>
