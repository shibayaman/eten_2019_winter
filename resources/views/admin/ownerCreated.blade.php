@extends('layouts/app')

@section('title', 'ユーザー作成完了')

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
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project['project_code'] }}</td>
                    <td>{{ $project['password'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</article>
@endsection