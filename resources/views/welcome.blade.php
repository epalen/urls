<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel URL Shortener') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <h1 class="title">Laravel URL Shortener</h1>

                {!! Form::open(array('action' => 'LinkController@makeUrl', 'method' => 'post')) !!}
                    {{ csrf_field() }}
                    <input type="url" name="url" placeholder="Enter a URL." autocomplete="off"{{ (Input::old('url')) ? ' value="' . e(Input::old('url')) . '"' : '' }}>
                    <input type="submit" value="Shorten">
                {!! Form::close() !!}
                <br>
                @if(Session::has('global'))
                    <p>{{ Session::get('global') }}</p>
                    <input type="text" value="{{ Session::get('success') }}" id="copytextInput">
                    <button onclick="copytextFunction()">Copy short url</button>
                @endif
            </div>
        </div>
        <script>
            function copytextFunction() {
              var copyText = document.getElementById("copytextInput");
              copyText.select();
              document.execCommand("copy");
              alert("Short url copied: " + copyText.value);
            }
        </script>
    </body>
</html>
