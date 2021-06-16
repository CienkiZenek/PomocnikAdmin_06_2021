@extends('szablon')
@section('title', 'Miejsca dyskusji - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista miejsc do dyskusji w sieci
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchMiejsca')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        {{--NIE poajawia się to jest lista Znalezionych jakiegoś usera--}}

        <div class="col-6">
            @if(!isset($odUsera))
            <a href="{{route('miejscaNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe miejsce dyskusji</a>
        @else

            <p class="h5"> Lista "Miejsc" dodanych przez: <a href="{{route('edycjaUzytkownika', $user)}}" class="btn btn-primary" role="button" aria-pressed="true">{{$user->name}}</a></p>
            @endif
        </div>

    </div>


    <div class="list-group row mt-3">
    @foreach($Wyniki as $miejsce)
            <div class="col-10 size20"> <a href="{{ route('edycjaMiejsca', $miejsce->id) }}" class="list-group-item list-group-item-action">{{ $miejsce->tytul }}  <span class="text-danger">({{ $miejsce->media->nazwa }})</span> </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
