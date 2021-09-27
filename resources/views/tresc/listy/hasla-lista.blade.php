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
            <div class="col-10 size20"><a href="{{ route('edycjaHasla', $haslo->id) }}" class="list-group-item list-group-item-action"><span class="fw-bold">{{ $haslo->haslo }}</span>  <span class="fs-6 ">( Zagadnień: {{ $haslo->zagadnienia->count()}}) </span></a>
    </div>

            @foreach($haslo->zagadnienia as $zagadnienie)
                <div class="col-10">

                    <div class="offset-1 col-11 size20 ">
                        <a href="{{ route('edycjaZagadnienia', $zagadnienie->id) }}" class="list-group-item list-group-item-action"><i class="bi bi-arrow-right me-3"></i> {{ $zagadnienie->zagadnienie }}

                            {{-- ikona obrazująca status zagadnienia --}}
                            @if($zagadnienie->status=='Aktywny')
                                <i class="bi bi-circle-fill ms-3" style="color: lightgreen"   title="Widoczna"></i>
                                @else
                                <i class="bi bi-circle-fill ms-3" style="color: red"  title="NIEwidoczna"></i>
                                @endif
                            {{-- Ikona pokazując czy zadadnienie jest zajawiane w rotatorze --}}
                            @if($zagadnienie->zajawka_pokaz=='Tak')
                                <i class="bi bi-diamond-fill ms-3" style="color: #0a58ca" title="Zajawka na stronie głównej"></i>

                            @endif

                            {{-- Obrazek 1 --}}
                            @if(Str::length($zagadnienie->obrazek1)>5)
                                <i class="bi bi-file-image ms-3" style="color: #0a58ca" title="Obrazek 1"></i>

                            @endif

                            {{-- Obrazek 2 --}}
                            @if(Str::length($zagadnienie->obrazek2)>5)
                                <i class="bi bi-file-image ms-3" style="color: #0a58ca" title="Obrazek 2"></i>
                            @endif

                        </a>
                    </div>
                    {{--<a href="{{ route('zagadnienieCale', $zagadnienie->slug) }}" class="link-dark">{{$zagadnienie->zagadnienie}}
                    </a>
--}}
                </div>

            @endforeach


    @endforeach
    </div>
    @include('dodatki.paginacja')
@endsection
