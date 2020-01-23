@extends('../layouts/app')

@section('title', 'ユーザー管理')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

<body>
	@section('content')
	<div class="field column is-offset-10">
		<form action="{{ route('logout') }}" method="post">
			@csrf
			<input type="submit" value="ログアウト" class="button is-rounded is-dark is-medium">
		</form>
	</div>
	<div class="field">
		<div class="column is-three-fifths is-offset-5">
				<h1 class="title">ユーザ管理画面</h1>
		</div>
	</div>
	<hr>

	<a class="button" href="{{ route('owners.create') }}">ユーザー作成</a><br>
	<a href="{{ route('owners.index') }}">全ユーザー一覧</a> |
	<a href="{{ route('owners.index', ['field' => $fields['IT']]) }}">IT科ユーザー一覧</a> |
	<a href="{{ route('owners.index', ['field' => $fields['WEB']]) }}">Web科ユーザー一覧</a> |
	<a href="{{ route('owners.index', ['field' => $fields['GRAPHIC']]) }}">グラフィック科ユーザー一覧</a>

@endsection
</body>
