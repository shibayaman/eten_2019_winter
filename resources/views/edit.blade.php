<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/registration.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js">
        </script>
        <title>作品編集</title>
    </head>
    <body>
		<div class="field column is-offset-10">
			<form action="{{ route('logout') }}" method="post">
				@csrf
				<input type="submit" value="ログアウト" class="button is-rounded is-dark is-medium">
			</form>
		</div>
		<div class="field">
			<div class="column is-three-fifths is-offset-5">
				<h1 class="title">作品編集フォーム</h1>
			</div>
		</div>
		<div class="field">
			<div class="columns">
				<div class="column is-offset-3">
					<label class="label is-large">作品コード : {{ $owner->project_code }}</label>
				</div>
				<div class="column">
					<label class="label is-large">クラス名 : {{ $owner->class_id }} </label>
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
								<input class="input column is-half" type="text" id="title" name="title" placeholder="作品名を入力してください" maxlength="24" value="{{ $owner->project->product_name }}">
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
								<input class="input column is-half" type="text" id="catch_copy" name="catch_copy" placeholder="40字以内でキャッチコピーを書いてください" maxlength="40" value="{{ $owner->project->catchphrase }}">
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
								<textarea class="textarea" placeholder="作品の詳細を書いてください" id="detail" name="detail" maxlength="300" rows="5">{{ $owner->project->description }}</textarea>
							</div>
						</div>
					</div>
				</div>
        <div class="field is-horizontal" id="imagefield">
					<div class="field-label">
            <label class="label">※画像</label>
					</div>
					<div class="field-body" >
            <div class="field">
              <img src="{{ asset('storage/image/' . $owner->project->image_path) }}" alt="作品画像">
            </div>
					</div>
				</div>
				<div class="field is-horizontal">
					<div class="field-label is-normal">
            <label class="label" style="display:none" id="imagelabel">※画像</label>
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
							<p class="help">16:9の比率で選択してください (.jpeg .png .gif)</p>
						</div>
					</div>
				</div>
        <div class="field is-horizontal">
					<div class="field-label">
					</div>
					<div class="field-body">
            <div class="field">
              <button type="button" class="button is-small" id="deletebutton" style="display:none">キャンセル</button>
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
                    <input class="input" type="number"  id="period" name="period" placeholder="0" min="1" maxlength="10" value="{{ $time_num }}">
								</p>
								<p class="control">
									<span class="select" id="time_tag">
										<select name="time_tag">
											<option {{ strpos($owner->project->production_time, '時間') ? 'selected' : '' }}>時間</option>
											<option {{ strpos($owner->project->production_time, '週間') ? 'selected' : '' }}>週間</option>
											<option {{ strpos($owner->project->production_time, 'ヶ月') ? 'selected' : '' }}>ヶ月</option>
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
								<input class="input column is-half" type="text" id="represent" name="represent" value="{{ $owner->project->leader_name }}" placeholder="代表者の名前を入力してください" maxlength="30">
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
								<input class="input column is-half" type="text" id="team" name="team" value="{{ $owner->project->team_name }}" placeholder="チーム名を入力してください">
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
                  <input class="input column is-half" type="text" id="member0" name="member[0]" value="{{$member_array ? $member_array[0] : ""}}" placeholder="代表者以外のメンバーの名前を入力してください">
                  <span class="icon is-small is-left">
                    <i class="fas fa-user"></i>
                  </span>
                </div>
              </div>
            </div>
          </div>
            @for($i = 1; $i < count($member_array); $i++)
              <div class="field is-horizontal">
                <div class="field-label is-normal">
                </div>
                <div class="field-body">
                  <div class="field">
                    <div class="control has-icons-left has-icons-right">
                      <input class="input column is-half" type="text" id="member{{ $i }}" name="member[{{ $i }}]" value="{{$member_array[$i]}}" placeholder="代表者以外のメンバーの名前を入力してください">
                      <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            @endfor
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
								<div class="select" id="ganreselect">
									<select id="genre" name="genre">
                    @foreach ($result_genres as $genre)
                      <option>{{ $genre }}</option>
                    @endforeach
										<!-- @if($owner->class->field === $fields["IT"])
											<option {{ strpos($owner->project->genre, 'モバイルアプリ') ? 'selected' : '' }}>モバイルアプリ</option>
											<option {{ strpos($owner->project->genre, 'PCアプリケーション') ? 'selected' : '' }}>PCアプリケーション</option>
											<option {{ strpos($owner->project->genre, 'WEBアプリケーション') ? 'selected' : '' }}>Webアプリケーション</option>
											<option>ゲーム</option>
										@elseif($owner->class->field === $fields["WEB"])
											<option {{ strpos($owner->project->genre, 'Webサイト') ? 'selected' : '' }}>Webサイト</option>
											<option {{ strpos($owner->project->genre, 'Webアプリケーション') ? 'selected' : '' }}>Webアプリケーション</option>
										@elseif($owner->class->field === $fields["GRAPHIC"])
											<option {{ strpos($owner->project->genre, 'グラフィック') ? 'selected' : '' }}>グラフィック</option>
										@endif
										-->
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
      <script>
        var count = {{ count($member_array) }};
      </script>
    	<script src="{{ asset('js/edit.js') }}"></script>
    </body>
</html>
