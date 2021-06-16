@extends('szablon')
@section('title', 'Komunikaty - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista komuników (dla wszytskich czytelników)
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchKomunikaty')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('komunikatyNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowy komunikat</a>
        </div>
    </div>


    <div class="list-group row mt-3">
    @foreach($Wyniki as $komunikat)
           <div class="col-8 size20"> <a href="{{ route('edycjaKomunikaty', $komunikat->id) }}" class="list-group-item list-group-item-action">{{ $komunikat->tytul }}  ({{ $komunikat->created_at->format('Y.m.d')}}) </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
