@extends('../layouts/app')

@section('title', 'トークン管理')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<h1 class="title">トークン管理画面</h1>
<a href="/admin/owners/create">トークン発行</a>
<form action="{{ Route('admin.logout') }}" method="post">	
	@csrf
  <input type="submit" class="button" value="ログアウト">
</form>
@endsection