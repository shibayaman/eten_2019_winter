@extends('layouts/app')

@section('title', 'ユーザー編集')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@endsection

<body>
@section('content')
  <div>
    <p>登録した作品の編集機能を実装予定です。</p>
    <p>変更したい方は機能実装までお待ちください。</p>
    <a href="{{ route('projects.show', ['project' => $id]) }}">登録した作品を表示</a>
    <form action="{{ route('logout') }}" method="post">
      @csrf
      <input type="submit" value="ログアウト" class="button is-rounded is-outlined is-info is-small">
    </form>
  </div>
@endsection

@section('scripts')
@endsection
</body>
