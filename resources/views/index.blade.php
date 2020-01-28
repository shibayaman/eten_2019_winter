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
    <link rel="stylesheet" href="{{ asset('css/professional/style.css') }}">
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
                <ul>
                    <li><a @if($field === $fields['IT']) class="nav_select_it" @endif href="{{ route('projects.index', ['field' => $fields['IT']]) }}">IT</a></li>
                    <li><a @if($field === $fields['WEB']) class="nav_select_design" @endif href="{{ route('projects.index', ['field' => $fields['WEB']]) }}">WEB</a></li>
                    <li><a @if($field === $fields['GRAPHIC']) class="nav_select_design" @endif href="{{ route('projects.index', ['field' => $fields['GRAPHIC']]) }}">GRAPHIC</a></li>
                </ul>
            </nav>
        </div>
        <div class="header_top">
            <h3 class="header_top_select_course"></h3>
            <div class="header_top_select_wrap">
                <p>絞り込み</p>
                <form action="{{ route('projects.index') }}" method="get" id="filter-form">
                    <input type="hidden" name="field" value="{{ $field }}">
                    <select name="filter" id="filter">
                        <option value="サンプル">選択してください</option>
                        <optgroup label="学年から選ぶ">
                            <option value="1" {{ request()->query('filter') == 1 ? 'selected' : '' }}>1年生</option>
                            <option value="2" {{ request()->query('filter') == 2 ? 'selected' : '' }}>2年生</option>
                            <option value="3" {{ request()->query('filter') == 3 ? 'selected' : '' }}>3年生</option>
                            <option value="4" {{ request()->query('filter') == 4 ? 'selected' : '' }}>4年生</option>
                        </optgroup>
                        <optgroup label="卒業年次から選ぶ">
                            <option value="20" {{ request()->query('filter') == 20 ? 'selected' : '' }}>20年3月卒業</option>
                            <option value="21" {{ request()->query('filter') == 21 ? 'selected' : '' }}>21年3月卒業</option>
                            <option value="22" {{ request()->query('filter') == 22 ? 'selected' : '' }}>22年3月卒業</option>
                            <option value="23" {{ request()->query('filter') == 23 ? 'selected' : '' }}>23年3月卒業</option>
                        </optgroup>
                    </select>
                </form>
            </div>
        </div>
    </header>
    <main id="main">
        <div class="works_wrap">
            @foreach ($projects as $project)
                <div class="work">
                    <a href="{{ route('projects.show', ['project' => $project->id]) }}" class="sp_text_wrap">
                        <div class="work_img_number_wrap">
                            <p class="work_img"><img src="{{ asset('storage/image/' . ($project->image_path ?? 'noimage.jpg')) }}" alt="作品画像"></p>
                            <p class="number_exhibit @if($field === $fields['IT']) number_it @else number_design @endif">{{ $project->owner->project_code }}</p>
                        </div>
                        <div class="sp_text">
                            <p class="genre_name @if($field === $fields['IT']) genre_it @else genre_design @endif">{{ $project->genre }}</p>
                            <h4 class="work_name">{{ $project->product_name }}</h4>
                            <p class="work_ex_text">{{ $project->catchphrase }}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        {{ $projects->appends(request()->input())->links()}}
    </main>
    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>