@extends('szablon')
@section('title', 'Poradnik dyskutanta - menu')
@section('tresc')


    <div class="row" >
        <div class="btn-group btn-group-lg " role="group" aria-label="...">
            <a href="{{route('listaUzytkownikow')}}" class="btn btn-primary" role="button" aria-pressed="">Użytkownicy</a>
            <a href="{{route('listaCzlonkowie')}}" class="btn btn-primary" role="button" aria-pressed="true">Członkowie</a>
            <a href="{{route('listaKomunikaty')}}" class="btn btn-primary" role="button" aria-pressed="true">Komunikaty (zewn.)</a>
            <a href="{{route('listaInfo')}}" class="btn btn-primary" role="button" aria-pressed="true">Info (wewn.)</a>
        </div>
    </div>

    <div class="row  mt-1" >
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a href="{{route('listaZnalezione')}}" class="btn btn-primary" role="button" aria-pressed="true">Znalezione w sieci</a>
            <a href="{{route('listaMiejsca')}}" class="btn btn-primary" role="button" aria-pressed="true">Miejsca do dyskusji</a>
                        <a href="{{route('listaMemy')}}" class="btn btn-primary" role="button" aria-pressed="true">Memy</a>
            <a href="{{route('listaTagi')}}" class="btn btn-primary" role="button" aria-pressed="true">Tagi</a>
            <a href="{{route('listaMedia')}}" class="btn btn-primary" role="button" aria-pressed="true">Media</a>
        </div>
    </div>

    <div class="row mt-1" >
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a href="{{route('listaDzialy')}}" class="btn btn-primary" role="button" aria-pressed="true">Działy</a>
            <a href="{{route('listaKategorie')}}" class="btn btn-primary" role="button" aria-pressed="true">Kategorie</a>
            <a href="{{route('listaHasla')}}" class="btn btn-primary" role="button" aria-pressed="true">Hasła</a>
            <a href="{{route('listaZagadnienia')}}" class="btn btn-primary" role="button" aria-pressed="true">Zagadnienia</a>
        </div>
    </div>
    <div class="row mt-1" >
        <div class="btn-group btn-group-lg" role="group" aria-label="...">
            <a href="{{route('listaZagadnieniaUwagi', 'Nowa')}}" class="btn btn-primary" role="button" aria-pressed="true">Zagadnienia/Hasła - uwagi</a>
            <a href="{{route('listaPropozycje', 'Nowa')}}" class="btn btn-primary" role="button" aria-pressed="true">Propozycje</a>
            <a href="{{route('listaPropozycjeUwagi', 'Nowa')}}" class="btn btn-primary" role="button" aria-pressed="true">Propozycje - uwagi</a>


        </div>
    </div>
    <div class="row mt-1" >
        <div class="btn-group btn-group-lg col-6"  role="group" aria-label="...">
            <a href="{{route('listaPrzekazDnia')}}" class="btn btn-primary" role="button" aria-pressed="true">Przekaz dnia</a>

        </div>
        <div class="btn-group btn-group-lg col-6"  role="group" aria-label="...">
           {{-- <a href="{{route('karuzela')}}" class="btn btn-primary" role="button" aria-pressed="true">Karuzela</a>--}}

        </div>
    </div>
    <div class="row mt-1" >
        <div class="btn-group btn-group-lg col-6"  role="group" aria-label="...">
            <a href="{{route('listy_do')}}" class="btn btn-primary" role="button" aria-pressed="true">Listy</a>

        </div>
        <div class="btn-group btn-group-lg col-6"  role="group" aria-label="...">
           {{-- <a href="{{route('livewire')}}" class="btn btn-primary" role="button" aria-pressed="true">Livewire</a>--}}

        </div>
    </div>

<div class="row border rounded mt-3 tlo-szare2">

    <div class="col-3 "><p class="h4">Użytkownicy: </p></div>
    <div class="col-3"><p class="h5">Wszyscy: {{$users->count()}}</p></div>

    <div class="col-3"><p class="h5">Aktywni: {{$users->where('stan', 'Aktywny')->count()}}</p></div>
    <div class="col-3"><p class="h5">Zawieszeni: {{$users->where('stan', 'Zawieszony')->count()}}</p></div>

</div>

    <div class="row border  mt-1 rounded tlo-szare2">

        <div class="col-3"><p class="h5">Działy: {{$dzialy->count()}}</p></div>
        <div class="col-3"><p class="h5">Kategorie: {{$kategorie->count()}}</p></div>

        <div class="col-3"><p class="h5">Hasła: {{$hasla->count()}}</p></div>
        <div class="col-3"><p class="h5">Zagadnienia: {{$zagadnienia->count()}}</p></div>

    </div>

    <div class="row border  mt-1 rounded tlo-szare2">

        <div class="col-3"><p class="h5">Memy: {{$memy->count()}}</p></div>
        <div class="col-3"><p class="h5">Tagi: {{$tagi->count()}}</p></div>

        <div class="col-3"></div>
        <div class="col-3"></div>

    </div>


@endsection
