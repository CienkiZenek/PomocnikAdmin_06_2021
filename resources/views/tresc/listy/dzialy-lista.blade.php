@extends('szablon')
@section('title', 'Działy - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista działów
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchDzialy')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('dzialyNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowy dział</a>
        </div>
    </div>




    <div class="list-group row mt3">
    @foreach($Wyniki as $dzial)

           <div class="col-8 size20"> <a href="{{ route('edycjaDzialy', $dzial->slug) }}" class="list-group-item list-group-item-action">{{ $dzial->dzial }} ( Kategorii: {{ $dzial->kategorie->count()}}) </a>


           </div>

    @endforeach
    </div>
   {{-- @include('dodatki.paginacja')--}}
@endsection
