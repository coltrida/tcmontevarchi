<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body style="background-color: whitesmoke">
<div style="background-color: gray">
    {{--<a class="navbar-brand" href="#" style="border:0;padding:0">
        <img src="{{asset('img/logo2.png')}}" alt="logo" height="60">
    </a>--}}

</div>

<div>
    <form action="http://tcmontevarchi2.local/reimposta" method="post">
        @csrf

        <input type="hidden" name="indirizzo" value="{{$indirizzo}}">
        <input type="submit" value="Clicca qui per re-impostare la password">
    </form>
    {{--<a href="http://tcmontevarchi2.local/reimposta/{{$indirizzo}}" target="_blank">
        <button>
            <h3>Clicca qui per re-impostare la password</h3>
        </button>
    </a>--}}
</div>

</body>
</html>