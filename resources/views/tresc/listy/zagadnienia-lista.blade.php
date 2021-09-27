@extends('szablon')
@section('title', 'Zagadnienia - lista')
@section('tresc')

    <p class="badge bg-secondary fs-5">
        Lista zagadnień
    </p>
    <div class="row mt-2">

        <div class="col-6">
            <form action="{{route('searchZagadnienia')}}" method="get">
                <div class="input-group">

                    <input type="text" class="form-control btn-lg" placeholder="Szukaj..." id="szukane" name="szukane" value="{{request()->get('szukane')}}" aria-label="szukaj" aria-describedby="">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit">Szukaj</button>

                    </div></div>
            </form>
        </div>
        <div class="col-6">
            <a href="{{route('zagadnienieNowe')}}" class="btn btn-primary" role="button" aria-pressed="true">Dodaj nowe zagadnienie</a>
        </div>
    </div>




    <div class="list-group row mt-2">
    @foreach($Wyniki as $zag)
           <div class="col-8 size20"><a href="{{ route('edycjaZagadnienia', $zag->id) }}" class="list-group-item list-group-item-action"><span class="fw-bold">{{ $zag->zagadnienie }}</span> <span class="fs-6 ">({{$zag->hasla->haslo}})</span>

                   {{-- ikona obrazująca status zagadnienia --}}
                   @if($zag->status=='Aktywny')
                       <i class="bi bi-circle-fill ms-3" style="color: lightgreen"   title="Widoczna"></i>
                   @else
                       <i class="bi bi-circle-fill ms-3" style="color: red"  title="NIEwidoczna"></i>
                   @endif
                   {{-- Ikona pokazując czy zadadnienie jest zajawiane w rotatorze --}}
                   @if($zag->zajawka_pokaz=='Tak')
                       <i class="bi bi-diamond-fill ms-3" style="color: #0a58ca" title="Zajawka na stronie głównej"></i>

                   @endif

                   {{-- Obrazek 1 --}}
                   @if(Str::length($zag->obrazek1)>5)
                       <i class="bi bi-file-image ms-3" style="color: #0a58ca" title="Obrazek 1"></i>

                   @endif

                   {{-- Obrazek 2 --}}
                   @if(Str::length($zag->obrazek2)>5)
                       <i class="bi bi-file-image ms-3" style="color: #0a58ca" title="Obrazek 2"></i>
                   @endif
               </a>
    </div>
    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
