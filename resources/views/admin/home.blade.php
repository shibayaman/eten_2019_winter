@extends('../layouts/app')

@section('title', 'ユーザー管理')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<h1 class="title">ユーザ管理画面</h1>
<a href="{{ route('owners.create') }}">ユーザー作成</a><br>
<a href="{{ route('owners.index') }}">全ユーザー一覧</a> |
<a href="{{ route('owners.index', ['field' => $fields['IT']]) }}">IT科ユーザー一覧</a> |
<a href="{{ route('owners.index', ['field' => $fields['WEB']]) }}">Web科ユーザー一覧</a> |
<a href="{{ route('owners.index', ['field' => $fields['GRAPHIC']]) }}">グラフィック科ユーザー一覧</a>
{{-- <a href="{{ " --}}

<form action="{{ route('admin.logout') }}" method="post">	
	@csrf
  <input type="submit" class="button" value="ログアウト">
</form>
@endsection