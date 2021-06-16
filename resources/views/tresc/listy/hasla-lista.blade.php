@extends('szablon')
@section('title', 'Hasła - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista haseł
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchHasla')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('hasloNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe hasło</a>
        </div>
    </div>

    <div class="list-group row mt-3">
    @foreach($Wyniki as $haslo)
           <div class="col-8 size20"> <a href="{{ route('edycjaHasla', $haslo->id) }}" class="list-group-item list-group-item-action">{{ $haslo->haslo }}  ( Zagadnień: {{ $haslo->zagadnienia->count()}}) </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
