<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <title>作品登録画面</title>

    </head>
    <body>

      <form action="confirmation.blade.php" method="post">
        <div class="section">
            <label class="label">作品名</label>
            <div class="field">
                <div class="control">
                  <input class="input column is-half" type="text" placeholder="作品名を入力してください">
                </div>
            </div>

            <label class="label">キャッチコピー</label>
              <div class="field">
                <div class="control">
                  <input class="input column is-half" type="text" placeholder="30字以内" maxlength="30">
                </div>
              </div>

            <label class="label">詳細</label>
              <div class="field">
                <textarea class="textarea column is-two-thirds" placeholder="作品の詳細を書いてください" maxlength="300"></textarea>
              </div>

            <label class="label">画像</label>
              <div class="field">
                <div id="file-selector" class="file has-name">
                  <label class="file-label">
                    <input class="file-input" type="file" name="resume">
                    <span class="file-cta">
                      <span class="file-icon">
                        <i class="fas fa-upload"></i>
                      </span>
                      <span class="file-label">
                        ファイルを選択
                      </span>
                    </span>
                    <span class="file-name">
                      選択されていません
                    </span>
                  </label>
                </div>
            </div>

            <label class="label">制作期間</label>
                <div class="field has-addons">
                  <p class="control">
                    <input class="input" type="number" placeholder="1" min="1">
                  </p>
                  <p class="control">
                    <span class="select">
                      <select>
                        <option>時間</option>
                        <option>週</option>
                        <option>月</option>
                      </select>
                    </span>
                  </p>
                </div>

            <label class="label">代表者名</label>
              <div class="field">
                <div class="control has-icons-left has-icons-right">
                  <input class="input column is-one-third" type="text" placeholder="代表者の名前を入力してください">
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
              </div>

            <label class="label">チーム名</label>
            <div class="field">
                <div class="control">
                  <input class="input column is-one-third" type="text" placeholder="チーム名を入力してください">
                </div>
            </div>

            <label class="label">メンバー</label>
            <div class="field">
              <div class="control has-icons-left has-icons-right">
                <input class="input column is-one-third" type="text" placeholder="メンバーの名前を入力してください">
                <span class="icon is-small is-left">
                  <i class="fas fa-user"></i>
                </span>
              </div>
            </div>
            <div class="field">
              <button class="button" onClick="add_member">追加</button>
            </div>

            <label class="label">クラス名</label>
            <div class="field">
                <div class="control">
                  <div class="select">
                    <select>
                      <option>IE1A</option>
                      <option>IE2A</option>
                    </select>
                  </div>
                </div>
            </div>

            <label class="label">ジャンル</label>
            <div class="field">
                <div class="control">
                  <div class="select">
                    <select>
                      <option>モバイルアプリ</option>
                      <option>PCアプリケーション</option>
                      <option>ゲーム</option>
                      <option>その他</option>
                    </select>
                  </div>
                </div>
            </div>
            <div class="control">
                <input class="button is-info" type="submit" value="確認">
            </div>
        </div>
      </form>
        <script src="{{ asset('js/registration.js') }}"></script>
    </body>
</html>
