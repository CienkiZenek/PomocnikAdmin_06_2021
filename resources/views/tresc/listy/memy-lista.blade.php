@extends('szablon')
@section('title', 'Memy - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista memów i komiksów
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchMemy')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('memyNowe')}}" class="btn btn-primary btn-block" role="button" aria-pressed="true">Dodaj nowego mema</a>
        </div>
    </div>


    <div class="list-group row mt-3">
    @foreach($Wyniki as $mem)
           <div class="col-8 size20"> <a href="{{ route('edycjaMemy', $mem->id) }}" class="list-group-item list-group-item-action">{{ $mem->podpis }}   </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
