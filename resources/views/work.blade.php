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
    <link rel="icon" type="image/vnd.microsoft.icon" href="favicon.ico">
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
                <ul>
                    <li><a class="nav_select_it" href="{{ route('projects.index', ['field' => $fields['IT']]) }}">IT</a></li>
                    <li><a href="{{ route('projects.index', ['field' => $fields['WEB']]) }}">WEB</a></li>
                    <li><a href="{{ route('projects.index', ['field' => $fields['GRAPHIC']]) }}">GRAPHIC</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main  id="main">
        <div class="work">
            <div class="work_genre_name_wrap">
                <p class="work_genre_name work_genre_it">PCアプリケーション</p>
                <h4 class="work_name">作品名作品名作品名</h4>
            </div>
            <div class="work_img_table_wrap">
                <p class="work_img"><img src="{{ asset('img/works_img.jpg') }}" alt="作品画像"></p>
                <table class="work_select_it work_ex">
                    <tr>
                        <th>作品番号</th>
                        <td>W06</td>
                    </tr>
                    <tr>
                        <th>チーム名</th>
                        <td>あいうえお</td>
                    </tr>
                    <tr>
                        <th>代表者</th>
                        <td><span class="work_course_name">高度情報処理研究学科 IT開発エキスパートコース 2年(22年度卒)</span><br>田中太郎</td>
                        <td>
                    </tr>
                    <tr>
                        <th>メンバー</th>
                        <td>田中太郎 田中太郎 田中太郎 田中太郎</td>
                    </tr>
                    <tr>
                        <th>制作期間</th>
                        <td>2ヶ月</td>
                    </tr>
                </table>
            </div>
            <table class="work_select_it work_comment">
                <tr>
                    <th>作品コメント</th>
                    <td>詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト詳細テキスト</td>
                </tr>
            </table>
        </div>
        <div class="pagenation">
            <a href="">前へ</a>
            <a class="return" href="{{ route('projects.index', ['field' => 'IT']) }}">戻る</a>
            <a href="">次へ</a>
        </div>
    </main>
</body>

</html>