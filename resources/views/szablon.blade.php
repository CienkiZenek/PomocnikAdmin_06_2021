<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Poradnik dyskutanta')</title>

    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-reboot.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/bootstrap-css/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/lightbox.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/fonty.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/css/styleAdmin.css')}}">
    @livewireStyles

</head>
<body class="d-flex flex-column min-vh-100">

<div class="container " id="zawartoscGlowna">


<div class="row text-center mt-3" id="tytul">

   {{-- @if()
        // wczytywanie przycisku do listy userów gdy jest wczytant szablon user-edycja.blade....
    @endif--}}

    <h4 class="col-12 badge bg-warning text-dark">
            @if(isset($linkiDoListy))

                @if(isset($lista))

                <a href="{{$linkiDoListy}}/{{$lista}}" class="btn btn-primary" role="button" aria-pressed="true">{{$nazwaListy}}</a>

        @else

            <a href="{{$linkiDoListy}}" class="btn btn-primary" role="button" aria-pressed="true">{{$nazwaListy}}</a>

            @endif
        @endif

            <a href="/" class="btn btn-primary my-2" role="button" aria-pressed="true">Menu główne</a>

            <span class="badge bg-secondary fs-3">Pomocnik dyskutanta - administracja</span></h4>
</div>
    {{-- Komunikaty - Start--}}
    @include('dodatki.komunikaty')
    {{-- Komunikaty - Koniec --}}

    <div class="wys10"></div>
    @yield('tresc')

</div>

{{--<footer class="tlo-szare1 mt-5 py-2">

<div class="col-12 text-center ">&reg; PomocnikDyskutanta 2021 </div>
</footer>--}}
    <footer class="tlo-szare1 mt-auto py-2">

        <div class="col-12 text-center ">&reg; PomocnikDyskutanta 2021 </div>
        <div class="fs-6">Wersja: 0.10</div>
    </footer>

<button onclick="topFunction()" id="myBtn" title="Do góry">Do góry</button>
@livewireScripts

</body>
<script src="{{ URL::asset('/js/jquery-3.5.1.min.js')}}"></script>
{{--<script src="{{ URL::asset('/js/bootstrap-js/bootstrap.min.js')}}"></script>--}}
<script src="{{ URL::asset('/js/bootstrap-js/bootstrap.bundle.min.js')}}"></script>

<script src="{{ URL::asset('/js/scriptsWspolneAdmin.js')}}"></script>
<script src="{{ URL::asset('/js/lightbox.js')}}"></script>
{{--<script src="{{ URL::asset('vendor/livewire/livewire.js')}}"></script>--}}

</html>