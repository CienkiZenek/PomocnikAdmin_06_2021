@extends('szablon')
@section('title', 'Kategorie - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista kategorii
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchKategorie')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('kategorieNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowa kategorię</a>
        </div>
    </div>

    <div class="list-group row mt-3">
    @foreach($Wyniki as $kategoria)
           <div class="col-8 size20"> <a href="{{ route('edycjaKategorie', $kategoria->id) }}" class="list-group-item list-group-item-action">{{ $kategoria->kategoria }} ( Haseł: {{ $kategoria->hasla->count()}}) </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
