@extends('../layouts/app')

@section('title', 'トークン管理')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/example.css') }}">
@endsection

@section('content')
<h1 class="title">トークン管理画面</h1>
<a href="/tokens/create">トークン発行</a>
@include('components/authLogoutForm')
@endsection