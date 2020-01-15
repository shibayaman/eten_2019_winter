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
            <h3 class="header_top_select_course">●階</h3>
            <div class="header_top_select_wrap">
                <p>絞り込み</p>
                <form action="{{ route('projects.index') }}" method="get" id="orderby-form">
                    <input type="hidden" name="field" value="{{ $field }}">
                <select name="orderby" id="orderby">
                    <option value="サンプル" selected>選択してください</option>
                    <optgroup label="学年から選ぶ">
                        <option value="1">1年生</option>
                        <option value="2">2年生</option>
                        <option value="3">3年生</option>
                        <option value="4">4年生</option>
                    </optgroup>
                    <optgroup label="卒業年次から選ぶ">
                        <option value="2020">21年3月卒業</option>
                        <option value="2021">22年3月卒業</option>
                        <option value="2022">23年3月卒業</option>
                        <option value="2023">24年3月卒業</option>
                    </optgroup>
                </select>
                </form>
            </div>
        </div>
    </header>
    <main id="main">
        <div class="works_wrap">
            @for ($i = 0; $i < 8; $i++)
                <div class="work">
                    <a href="{{ route('projects.show', ['project' => 'a']) }}" class="sp_text_wrap">
                        <div class="work_img_number_wrap">
                            <p class="work_img"><img src="{{ asset('img/works_img.jpg') }}" alt="作品画像"></p>
                            <p class="number_exhibit @if($field === $fields['IT']) number_it @else number_design @endif">W03</p>
                        </div>
                        <div class="sp_text">
                            <p class="genre_name @if($field === $fields['IT']) genre_it @else genre_design @endif">PCアプリケーション</p>
                            <h4 class="work_name">作品名作品名作品名作品名作品名作品名作品名作品名</h4>
                            <p class="work_ex_text">おいしいご飯を紹介するサービス。新しい食事をしてみませんか？ああああああああああ</p>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
        <div class="pagenation">
            <a class="pagenation_not" href="">前へ</a>
            <a class="@if($field === $fields['IT']) pagenation_select_it @else pagenation_select_design @endif" href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a class="pagenation_dotted">...</a>
            <a href="">7</a>
            <a href="">次へ</a>
        </div>
    </main>
    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
</body>

</html>