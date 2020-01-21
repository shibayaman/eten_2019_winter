
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
		<div class="field column is-offset-10">
			<form action="{{ route('logout') }}" method="post">
				@csrf
				<input type="submit" value="ログアウト" class="button is-rounded is-outlined is-info is-medium">
			</form>
		</div>
		<div class="field">
			<div class="column is-three-fifths is-offset-5">
				<h1 class="title">作品登録フォーム</h1>
			</div>
		</div>
		<div class="field">
			<div class="columns">
				<div class="column is-offset-3">
					<label class="label is-large">作品コード : {{ $owner['project_code'] }}</label>
				</div>
				<div class="column">
					<label class="label is-large">クラス名 : {{ $owner['class_id'] }} </label>
				</div>
			</div>
		</div>
		<hr>
		<div class="field column is-offset-3" id="attention-field"></div>
		<form action="{{Route('projects.confirm')}}" id="registration_form" method="post" enctype="multipart/form-data">
			@csrf
			<div class="section column is-offset-2">
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">※作品名</label>
					</div>
					<div class="field-body">
						<div class="field" id="titlefield">
							<div class="control">
								<input class="input column is-half" type="text" id="title" name="title" placeholder="作品名を入力してください" maxlength="24">
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">※キャッチコピー</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control">
								<input class="input column is-half" type="text" id="catch_copy" name="catch_copy" placeholder="40字以内でキャッチコピーを書いてください" maxlength="40">
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">※詳細</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control">
								<textarea class="textarea" placeholder="作品の詳細を書いてください" id="detail" name="detail" maxlength="300" rows="5"></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">※画像</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div id="file-selector" class="file has-name">
								<label class="file-label">
									<input class="file-input" type="file" id="image" name="image" accept="image/*">
									<span class="file-cta">
										<span class="file-icon">
											<i class="fas fa-upload"></i>
										</span>
										<span class="file-label">ファイルを選択</span>
									</span>
									<span class="file-name" id="file-name">選択されていません</span>
								</label>
							</div>
							<p class="help">16:9の比率で選択してください</p>
						</div>
					</div>
				</div>
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">※制作期間</label>
						</div>
						<div class="field-body">
							<div class="field has-addons">
								<p class="control">
									<input class="input" type="number"  id="period" name="period" placeholder="0" min="1" maxlength="10">
								</p>
								<p class="control">
									<span class="select" id="time_tag">
										<select name="time_tag">
											<option>時間</option>
											<option>週間</option>
											<option>ヶ月</option>
										</select>
									</span>
								</p>
							</div>
						</div>
					</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">※代表者名</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control has-icons-left has-icons-right">
								<input class="input column is-half" type="text" id="represent" name="represent" placeholder="代表者の名前を入力してください" maxlength="30">
								<span class="icon is-small is-left">
									<i class="fas fa-user"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">※チーム名</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control">
								<input class="input column is-half" type="text" id="team" name="team" placeholder="チーム名を入力してください">
							</div>
						</div>
					</div>
				</div>
				<div class="field" id="memberinput">
					<div class="field is-horizontal">
						<div class="field-label is-normal">
							<label class="label">メンバー</label>
						</div>
						<div class="field-body">
							<div class="field">
								<div class="control has-icons-left has-icons-right">
									<input class="input column is-half" type="text" id="member0" name="member[]" placeholder="代表者以外のメンバーの名前を入力してください">
									<span class="icon is-small is-left">
										<i class="fas fa-user"></i>
									</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label">
					</div>
					<div class="field-body">
						<div class="field">
							<button class="button" type="button" id="add_member">追加</button>
						</div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">ジャンル</label>
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control">
								<div class="select">
									<select id="genre" name="genre">
										@if($class === "IT")
											<option>モバイルアプリ</option>
											<option>PCアプリケーション</option>
											<option>Webアプリケーション</option>
											<option>ゲーム</option>
										@elseif($class === "Web")
											<option>Webサイト</option>
											<option>Webアプリケーション</option>
										@else
											<option>グラフィック</option>
										@endif
										<option id="other">その他</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="field" id="genrefield">
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
					</div>
					<div class="field-body">
						<div class="field">
							<div class="control column is-offset-2">
								<input class="button is-outlined is-rounded is-info is-medium" type="submit" id="submit" value="確認">
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
    	<script src="{{ asset('js/registration.js') }}"></script>
    </body>
</html>
