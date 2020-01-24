@extends('../layouts/app')

@section('title', '管理者ログイン')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
	<div class="field">
	  <div class="column is-three-fifths is-offset-5">
	      <h1 class="title">管理者用ログイン画面</h1>
	  </div>
	</div>
	<hr>

	<form action="/admin/login" method="post">
		@csrf
		<div class="section column is-offset-3">

				<div class="field">
					<label class="label">ユーザ名</label>
					<div class="control">
						<input class="input column is-three-quarters" type="text" name="username" placeholder="ユーザ名を入力してください">
					</div>
				</div>

				<div class="field">
					<label class="label">パスワード</label>
					<div class="control">
						<input class="input column is-three-quarters" type="password" name="password" placeholder="パスワードを入力してください">
					</div>
				</div>

				<div class="field">
					<div class="control">
						<input type="submit" class="button is-outlined is-rounded is-info is-danger" value="ログイン">
					</div>
				</div>

				@if($errors->any())
					<article class="message is-danger column is-three-quarters">
					<div class="message-header">
						<p>エラー</p>
					</div>
					<div class="message-body">
						ログイン失敗
					</div>
					</article>
				@endif

		</div>
	</form>
@endsection
