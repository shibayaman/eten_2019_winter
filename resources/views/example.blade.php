<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/example.css') }}">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
        <title>Laravel</title>

    </head>
    <body>
        <div class="section">
            <div class="field">
                <label class="label">Username</label>
                <div class="control has-icons-left has-icons-right">
                    <input id="input" class="input is-success" type="text" placeholder="Text input" value="bulma">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span>
                </div>
                <p class="help is-success">This username is available</p>
            </div>
            <div class="control">
                <button id="submit" class="button is-link">Submit</button>
            </div>
            <p id="message" class="content">ブルマわかんねw</p>
        </div>
        <script src="{{ asset('js/example.js') }}"></script>
    </body>
</html>
