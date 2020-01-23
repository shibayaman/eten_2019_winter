@extends('../layouts/app')

@section('title', 'ユーザー管理')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

<<<<<<< HEAD
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
=======
@section('content')
<div class="field column is-offset-8">
    <form action="{{ route('admin.logout') }}" method="post">
		@csrf
		<input type="submit" class="button is-danger is-outlined is-rounded" value="ログアウト">
    </form>
</div>
<h1 class="title has-text-centered">ユーザ管理画面</h1>
<ul class="menu-list has-text-centered">
    <li><a href="{{ route('owners.create') }}">ユーザー作成</a></li>
    <li><a href="{{ route('owners.index') }}">全ユーザー一覧</a></li>
    <li><a href="{{ route('owners.index', ['field' => $fields['IT']]) }}">IT科ユーザー一覧</a> </li>
    <li><a href="{{ route('owners.index', ['field' => $fields['WEB']]) }}">Web科ユーザー一覧</a></li>
    <li><a href="{{ route('owners.index', ['field' => $fields['GRAPHIC']]) }}">グラフィック科ユーザー一覧</a></li>
</ul>
@endsection
>>>>>>> 9a38419d88500a9aa6605513534e1dd5477d653b
