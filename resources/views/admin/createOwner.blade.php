@extends('layouts/app')

@section('title', 'ユーザー作成')

@section('cssFile')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
{{-- <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script> --}}
@endsection

<body>
@section('content')
<form id="create_owner_form" action="{{ route('owners.store') }}" method="post">
    @csrf
    <div class="field is-horizontal">
        <div class="field-label is-normal">
            <label class="label">クラス</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="controll">
                    <div class="select">
                        <select name="class_id">
                            @foreach ($classes as $class)
                                <option value="{{ $class }}">{{ $class }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="project-code-container" class="field">
    <div class="field is-horizontal project-code-field">
        <div class="field-label is-normal">
            <label class="label">作品コード</label>
        </div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <input type="text" class="input column is-half" name="project_code[]" placeholder="作品コード" value="{{ old('project_code.0') }}">
                </div>
            </div>
        </div>
    </div>
    @if(!empty (old('project_code')))
        @foreach (old('project_code') as $index => $projectCode)
            @if($index !== 0)
                <div class="field is-horizontal project-code-field">
                    <div class="field-label is-normal">
                        <button type="button" class="delete"></button>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <div class="control">
                                <input type="text" class="input column is-half" name="project_code[]" placeholder="作品コード" value="{{ $projectCode }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    </div>
    <div class="field is-horizontal">
        <div class="field-label is-normal"></div>
        <div class="field-body">
            <div class="field">
                <div class="control">
                    <button type="button" id="add-project-code" class="button">追加</button>
                    <p id="help-max-40" class="help is-danger" style="display:none">同時に作成できるユーザーは40人までです</p>
                </div>
            </div>
        </div>
    </div>
    <div class="column is-8 is-offset-2">
        <div class="control">
            <input type="submit" class="button is-primary is-fullwidth" value="作成">
            <p id="help-not-filled" class="help is-danger" style="display:none">未入力の項目があります</p>
            @if($errors->any())
                @foreach (array_unique($errors->all()) as $key => $error)
                    <p class="help is-danger">{{ $error }}</p>
                @endforeach
            @endif
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script src="{{ asset('js/createOwner.js') }}"></script>
@endsection
</body>
