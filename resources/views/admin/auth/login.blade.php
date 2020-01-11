@extends('../layouts/app')

@section('title', '管理者ログイン')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<h1 class="title">管理者用ログイン画面</h1>
<form action="/admin/login" method="post">	
	@csrf
	<div class="field">
		<label class="label">ユーザ名</label>
		<div class="control">
			<input class="input" type="text" name="username" placeholder="ユーザ名">
		</div>
		<label class="label">パスワード</label>
		<div class="control">
			<input class="input" type="password" name="password" placeholder="パスワード">
		</div>
		<div class="control">
			<input type="submit" class="button is-primary" value="ログイン">
		</div>
	</div>
	@if($errors->any())
		<article class="message is-danger">
		<div class="message-header">
			<p>エラー</p>
		</div>
		<div class="message-body">
			ログイン失敗
		</div>
		</article>
	@endif
</form>
@endsection
