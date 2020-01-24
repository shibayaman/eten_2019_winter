<!DOCTYPE html>
<html lang="ja">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="keywords" content="ecc,ECC,ecc comp.,...">
    <meta name="description" content="ここに説明文を設定">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@twitteraccount">
    <meta property="og:site_name" content="＋E展 | 作品一覧">
    <meta property="og:title" content="＋E展 | 作品一覧">
    <meta property="og:description" content="＋E展で展示する作品一覧です。">
    <meta property="og:url" content="https://www.hogehoge.com">
    <meta property="og:image" content="https://www.hogehoge.com./hoge.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="400">
    <meta property="og:type" content="website">
    <link rel="canonical" hreflang="http://">
    <link rel="alternate" type="" title="" href="http://">
    <link rel="shortcut icon" href="http://www.hoge.hoge/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="apple-touch-icon" href="http://www.hoge.hoge/logo.png">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset('favicon.ico') }}">
    <title>＋E展 | 作品一覧</title>
    <link rel="stylesheet" href="{{ asset('css/professional/ress.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professional/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/professional/work.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="sideber">
            <div class="sp_header">
                <h1 id="logo">
                    <a href="http://click.ecc.ac.jp/ecc/plus-e-ten/">
                        <img src="{{ asset('img/logo.png') }}" alt="＋E展">
                    </a>
                </h1>
                <h2 class="sideber_sub_ttl">展示作品一覧</h2>
            </div>
            <nav id="nav">
                {{-- <ul>
                    @if($project->owner->class->field === "IT")
                        <li><a class="nav_select_it" href="{{ route('projects.index', ['field' => $fields['IT']]) }}">IT</a></li>
                        <li><a href="{{ route('projects.index', ['field' => $fields['WEB']]) }}">WEB</a></li>
                        <li><a href="{{ route('projects.index', ['field' => $fields['GRAPHIC']]) }}">GRAPHIC</a></li>
                    @elseif($project->owner->class->field == "Web")
                        <li><a href="{{ route('projects.index', ['field' => $fields['IT']]) }}">IT</a></li>
                        <li><a class="nav_select_design" href="{{ route('projects.index', ['field' => $fields['WEB']]) }}">WEB</a></li>
                        <li><a href="{{ route('projects.index', ['field' => $fields['GRAPHIC']]) }}">GRAPHIC</a></li>
                    @else
                        <li><a href="{{ route('projects.index', ['field' => $fields['IT']]) }}">IT</a></li>
                        <li><a href="{{ route('projects.index', ['field' => $fields['WEB']]) }}">WEB</a></li>
                        <li><a class="nav_select_design" href="{{ route('projects.index', ['field' => $fields['GRAPHIC']]) }}">GRAPHIC</a></li>
                    @endif
                </ul> --}}
            </nav>
        </div>
    </header>
    <main  id="main">
        <div class="work">
            <div class="work_genre_name_wrap">
            @if($project->owner->class->field === $fields['IT'])
                <p class="work_genre_name work_genre_it">{{$project->genre}}</p>
            @else 
                <p class="work_genre_name work_genre_design">{{$project->genre}}</p>
            @endif
                <h4 class="work_name">{{$project->product_name}}</h4>
            </div>
            <div class="work_img_table_wrap">
                <p class="work_img"><img src="{{ asset('storage/image/' . ($project->image_path ?? 'noimage.jpg')) }}" alt="作品画像"></p>
                @if($project->owner->class->field === $fields['IT'])
                    <table class="work_select_it work_ex">
                @else
                    <table class="work_select_design work_ex">
                @endif
                    <tr>
                        <th>作品番号</th>
                        <td>{{$project->owner->project_code}}</td>
                    </tr>
                    <tr>
                        <th>チーム名</th>
                        <td>{{$project->team_name}}</td>
                    </tr>
                    <tr>
                        <th>代表者</th>
                        <td><span class="work_course_name">{{$project->owner->class->subject}} {{$project->owner->class->grade}}年({{$project->owner->class->graduation_year}}年度卒)</span><br>{{$project->leader_name}}</td>
                        <td>
                    </tr>
                    <tr>
                        <th>メンバー</th>
                        <td>{{$project->team_member}}</td>
                    </tr>
                    <tr>
                        <th>制作期間</th>
                        <td>{{$project->production_time}}</td>
                    </tr>
                </table>
            </div>
            @if($project->owner->class->field === $fields['IT'])
            <table class="work_select_it work_comment">
            @else 
            <table class="work_select_design work_comment">
            @endif
                <tr>
                    <th>作品コメント</th>
                    <td>{{$project->description}}</td>
                </tr>
            </table>
        </div>
        {{-- <div class="pagination">
            <a>前へ</a>
            <a class="return">戻る</a>
            <a>次へ</a>
        </div> --}}
    </main>
</body>
</html>