@extends('szablon')
@section('title', 'Znalezione w sieci - lista')
@section('tresc')
    <p class="badge bg-secondary fs-5">
        Lista miejsc znalezionych w sieci
    </p>

    <div class="row mt-3">

        <div class="col-6">
            <form action="{{route('searchZnalezione')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>

        {{--NIE poajawia się to jest lista Znalezionych jakiegoś konkretnego usera--}}


        <div class="col-6">
            @if(!isset($odUsera))

            <a href="{{route('znalezioneNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe "znalezione w sieci"</a>
           @else
               <p class="h5"> Lista "Znalezionych" dodanych przez: <a href="{{route('edycjaUzytkownika', $user)}}" class="btn btn-primary" role="button" aria-pressed="true">{{$user->name}}</a></p>

            @endif

        </div>



    </div>


    <div class="mb-4"></div>

    <div class="list-group row">
    @foreach($Wyniki as $znal)
           <div class="col-8 size20"> <a href="{{ route('edycjaZnalezione', $znal->id) }}" class="list-group-item list-group-item-action ">{{ $znal->nazwa }}  <span class="text-danger">({{ $znal->rodzaj }})</span> </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')

@endsection
