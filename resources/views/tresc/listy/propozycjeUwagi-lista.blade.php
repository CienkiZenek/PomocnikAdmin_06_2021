@extends('szablon')
@section('title', 'Propozycje:Uwagi - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista dodanych uwag do propozycji zagadnień
    </p>

    <div class="row mt-3">

        <div class="col-6">
            <form action="{{route('searchPropozycjeUwagi')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        {{--<div class="col-6">
            <a href="{{route('propozycjeNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nową propozycję</a>
        </div>--}}

        <div class="col-6">
            <a href="{{route('listaPropozycjeUwagi', 'Wszystkie')}}" class="btn @if($lista=='Wszystkie') btn-secondary @else btn-primary  @endif"
               role="button" aria-pressed="true">Wszystkie</a>
            <a href="{{route('listaPropozycjeUwagi', 'Nowa')}}" class="btn @if($lista=='Nowa') btn-secondary @else btn-primary  @endif"
               role="button" aria-pressed="true">Nowe</a>
            <a href="{{route('listaPropozycjeUwagi', 'Oczekuje')}}" class="btn @if($lista=='Oczekuje') btn-secondary @else btn-primary  @endif"
               role="button" aria-pressed="true">Oczekujące</a>
            <a href="{{route('listaPropozycjeUwagi', 'Dodane')}}" class="btn @if($lista=='Dodane') btn-secondary @else btn-primary  @endif"
               role="button" aria-pressed="true">Dodane</a>
            <a href="{{route('listaPropozycjeUwagi', 'Usunięta')}}" class="btn @if($lista=='Usunięta') btn-secondary @else btn-primary  @endif"
               role="button" aria-pressed="true">Usunięte</a>
        </div>

    </div>




    <div class="list-group row mt-3">
    @foreach($Wyniki as $wynik)
           <div class="col-8 size20"> <a href="{{ route('edycjaPropozycjeUwagi', $wynik->id) }}" class="list-group-item list-group-item-action">
                   {{ Str::limit($wynik->naglowek, 40)}}
                   (<span class="text-primary">{{ App\User::findOrFail($wynik->dodal_user)->name }}, {{$wynik->updated_at->format('Y-m-d')}})</span>
                   <span class="text-danger">{{$wynik->status}}</span>
               </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
