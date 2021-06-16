@extends('szablon')
@section('title', 'Przekaz dnia - lista')
@section('tresc')
    <p class="badge bg-secondary fs-5">
        Lista "Przekazów dnia"
    </p>

    <div class="row mt-3">

        <div class="col-6">
            <form action="{{route('searchPrzekazDnia')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>



        <div class="col-6">

                <a href="{{route('PrzekazDniaNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowy "Przekaz dnia"</a>


        </div>



    </div>


    <div class="mb-4"></div>

    <div class="list-group row">
    @foreach($Wyniki as $przekaz)
           <div class="col-8 size20"> <a href="{{ route('przekazDniaEdycja', $przekaz->id) }}" class="list-group-item list-group-item-action ">{{ $przekaz->tytul }}   </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')

@endsection
