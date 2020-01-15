@extends('layouts/app')

@section('title', 'ユーザー一覧')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<table class="table is-striped is-fullwidth">
    <thead>
        <th>作品コード</th>
        <th>パスワード</th>
    </thead>
    <tbody>
        @foreach($owners as $owner)
            <tr>
                <td>{{ $owner['project_code'] }}</td>
                <td>{{ $owner['password'] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection