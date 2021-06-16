@extends('szablon')
@section('title', 'Listy do...')
@section('tresc')



    <div class="row mt-1" >
        <div class="btn-group btn-group-lg col-4"  role="group" aria-label="...">
            <a href="{{route('ListWszyscy')}}" class="btn btn-primary" role="button" aria-pressed="true">List do wszystkich</a>

        </div>
        <div class="btn-group btn-group-lg col-4"  role="group" aria-label="...">
            <a href="{{route('WyslijIZSK')}}" class="btn btn-primary" role="button" aria-pressed="true">List do członków IZŚK</a>

        </div>
        {{--<div class="btn-group btn-group-lg col-4"  role="group" aria-label="...">
            <a href="{{route('listWyslijWszystkim')}}" class="btn btn-primary" role="button" aria-pressed="true">Listy - wyślij do wszystkich</a>

        </div>--}}
    </div>

   {{-- <div class="row mt-1" >
        <div class="btn-group btn-group-lg col-4"  role="group" aria-label="...">
            <a href="{{route('list')}}" class="btn btn-primary" role="button" aria-pressed="true">Listy - zobacz (test)</a>

        </div>
        <div class="btn-group btn-group-lg col-4"  role="group" aria-label="...">
            <a href="{{route('listWyslij')}}" class="btn btn-primary" role="button" aria-pressed="true">Listy - wyślij (test)</a>

        </div>
        <div class="btn-group btn-group-lg col-4"  role="group" aria-label="...">
            <a href="{{route('listWyslijWszystkimTest')}}" class="btn btn-primary" role="button" aria-pressed="true">Wyślij do wszystkich (test)</a>

        </div>
    </div>--}}
@endsection