@extends('layouts/app')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/registration.css') }}">
@endsection
<body>
    @section('content')
    <div class="container">
    <div class="columns">
        <div class="column is-three-fifths is-offset-5">
            <h1 class="title">登録確認</h1>
        </div>
    </div>
      <div class="field">
        <div class="columns">
          <div class="column is-offset-3">
            <label class="label is-large">作品コード : {{ $project['project_code'] }}</label>
          </div>
          <div class="column">
            <label class="label is-large">クラス名 : {{ $project['class_id'] }} </label>
          </div>
        </div>
      </div>
    <hr>
        <div class="columns is-desktop">
            <div class="column is-5">
                <figure class="image is-16by9">
                <img src="{{ asset('storage/image/' . $path) }}" alt="作品の画像">
                </figure>
            </div>            
            <div class="column">
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">作品名</h5></div>
                    <div class="column">{{ $project['title'] }}</div>
                </div>
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">キャッチコピー</h5></div>
                    <div class="column">{{ $project['catch_copy'] }}</div>
                </div>
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">詳細</h5></div>
                    <div class="column">{{ $project['detail'] }}</div>
                </div>
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">制作期間</h5></div>
                    <div class="column">{{ $project['period'] . $project['time_tag'] }}</div>
                </div>
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">代表者名</h5></div>
                    <div class="column">{{ $project['represent'] }}</div>
                </div>
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">チーム名</h5></div>
                    <div class="column">{{ $project['team'] }}</div>
                </div>
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">メンバー</h5></div>
                    <div class="column">{{ implode(',',$project['member']) }}</div>
                </div> 
                <div class="columns">
                    <div class="column is-3"><h5 class="title is-5">ジャンル</h5></div>
                    <div class="column">{{ $project['genre'] }}</div>
                </div>
                
            </div>
        </div>
        <div class="buttons is-right">
            <form action="{{Route('projects.store')}}" method="post" style="margin:0;">
                @csrf
                <input type="hidden" name="title"  value="{{ $project['title'] }}">
                <input type="hidden" name="catch_copy"  value="{{ $project['catch_copy'] }}">
                <input type="hidden" name="detail"  value="{{ $project['detail'] }}">
                <input type="hidden" name="image"  value="{{ $path }}">
                <input type="hidden" name="period"  value="{{ $project['period'] . $project['time_tag'] }}">
                <input type="hidden" name="represent"  value="{{ $project['represent'] }}">
                <input type="hidden" name="team"  value="{{ $project['team'] }}">
                <input type="hidden" name="member"  value="{{ implode(',',$project['member']) }}">
                <input type="hidden" name="genre"  value="{{ $project['genre'] }}">

                <button type="submit" class="button is-info is-outlined is-rounded is-medium">登録する</button>
            </form>
            <button type="button" onclick="history.back()" class="button is-rounded is-medium">戻る</button>
        </div>
    </div>
    @endsection    
</body>
