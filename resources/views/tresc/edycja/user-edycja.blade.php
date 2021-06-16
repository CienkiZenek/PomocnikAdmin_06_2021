@extends('szablon')
@section('title', 'Użytkownik - edycja')
@section('tresc')

<div class="row size30">
    <div class="col-6  alert alert-dark ">{{$user->name}}</div>
    <div class="col-6  ">
        <span class="badge bg-secondary">{{$user->email}}</span>
        <span class="badge bg-info text-dark">Rejestracja: {{$user->created_at->format('Y-m-d')}}</span>

        </div>
</div>
    <form action="{{route('uzytkownikAktualizacja', $user->id)}}" method="POST">
        @csrf
        <div class="wys15"></div>
        <div class="row">
<div class="col-4 mb-3">

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="stan1">Stan:</span>
        </div>
        <select class="form-control" id="stan" name="stan" aria-label="stan" aria-describedby="stan1">
            <option value="Aktywny" @if($user->stan=='Aktywny') selected @endif>Aktywny</option>
            <option value="Zawieszony" @if($user->stan=='Zawieszony') selected @endif>Zawieszony</option>
            <option value="Usunięty" @if($user->stan=='Usunięty') selected @endif>Usunięty</option>
        </select>
    </div>


</div>


            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="ranga1">Ranga:</span>
                    </div>
                    <select class="form-control" id="ranga" name="ranga" aria-label="ranga" aria-describedby="ranga1">
                        <option value="Początkujacy" @if($user->ranga=='Początkujacy') selected @endif>Początkujacy</option>
                        <option value="Starszy" @if($user->ranga=='Starszy') selected @endif>Starszy</option>
                        <option value="Weteran" @if($user->ranga=='Weteran') selected @endif>Weteran</option>

                    </select>
                </div>
            </div>

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="uprawnienia1">Uprawnienia:</span>
                    </div>
                    <select class="form-control" id="uprawnienia" name="uprawnienia" aria-label="uprawnienia" aria-describedby="uprawnienia1">
                        <option value="Czytelnik" @if($user->uprawnienia=='Czytelnik') selected @endif>Czytelnik</option>
                        <option value="Autor" @if($user->uprawnienia=='Autor') selected @endif>Autor</option>
                        <option value="Redaktor" @if($user->uprawnienia=='Redaktor') selected @endif>Redaktor</option>
                        <option value="Administrator" @if($user->uprawnienia=='Administrator') selected @endif>Administrator</option>
                        <option value="Właściciel" @if($user->uprawnienia=='Właściciel') selected @endif>Właściciel</option>

                    </select>
                </div>
            </div>
        </div>
        {{-- Wyświatlanie dodania członkostwa w ISZK dla tych, co mają zweryfikowany e-mail--}}

        @if($user->hasVerifiedEmail())
        <div class="row mb-3">
            <div class="col-3">
                <div class="form-check form-switch">
                    <input type="hidden" name="izsk_warunek" value="0"/>
                <input class="form-check-input" type="checkbox" name="izsk_warunek" value="" id="izsk_warunek"
                       @if($user->izsk_warunek==1) checked @endif >
                <label class="form-check-label" for="izsk_warunek">IZSK</label>
            </div>


            </div>
            <div class="col-9" id="warunek2">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="czlonkowstwo1">Członkowstwo w IZŚK:</span>
                    </div>
                    <select class="form-control" id="izsk" name="izsk" aria-label="czlonkowstwo1" aria-describedby="czlonkowstwo1">
                        <option value="Nie" @if($user->izsk=='Nie') selected @endif>Nie</option>
                        <option value="Tak" @if($user->izsk=='Tak') selected @endif>Tak</option>


                    </select>
                </div>

            </div>
        </div>

        @if($user->izsk=='Tak' && $user->izsk_warunek)
            <div id="izsk_form">


        <div class="row  mb-3">
            <div class="col-4" >
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Imię:</span>
                    </div>
                    <input type="text" class="form-control" name="imie" id="imie" value="{{$user->imie}}" >
                </div>

            </div>

            <div class="col-4" >
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwisko:</span>
                    </div>
                    <input type="text" class="form-control" name="nazwisko" id="nazwisko" value="{{$user->nazwisko}}" >
                </div>

            </div>

            <div class="col-4" >

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >Ulica:</span>
                        </div>
                        <input type="text" class="form-control" name="ulica_nazwa" id="ulica_nazwa" value="{{$user->nazwisko}}" >
                    </div>



            </div>

        </div>

                <div class="row  mb-3">

                    <div class="col-3" >
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Numer domu:</span>
                            </div>
                            <input type="text" class="form-control" name="ulica_numer" id="ulica_numer" value="{{$user->ulica_numer}}" >
                        </div>

                    </div>

                    <div class="col-3" >
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Miejscowość:</span>
                            </div>
                            <input type="text" class="form-control" name="miejscowosc" id="miejscowosc" value="{{$user->miejscowosc}}" >
                        </div>

                    </div>

                    <div class="col-3" >
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Telefon:</span>
                            </div>
                            <input type="text" class="form-control" name="telefon" id="telefon" value="{{$user->telefon}}" >
                        </div>

                    </div>

                    <div class="col-3" >

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Kod pocztowy:</span>
                            </div>
                            <input type="text" class="form-control" name="kod" id="kod" value="{{$user->kod}}" >
                        </div>



                    </div>

                </div>





            </div>






        @endif
        {{-- Koniec wyświatlanie dodania członkostwa w ISZK dla tych, co mają zweryfikowany e-mail--}}
        @endif
        <div class="row mt-5">
            <div class="col-6">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </div>

            <div class="col-6">

                <a href="{{route('WyslijUser', $user->id)}}" class="btn btn-primary active" role="button" aria-pressed="false">Wyślij wiadomość do użytkownika</a>
            </div>
        </div>
</form>


        {{-- Warunek wyświaetlania aktywnosci usera -> gdy są pojawia się przyciaki do pokazania listy --}}
        @if($user->miejsca->count()>0 || $user->znalezione->count()>0)
        <div class="wys15"></div>
        {{--<div class="row ">

            <div class="col-4 ">
                <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Znalezione</a>
            </div>
            <div class="col-4">
                <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Miejsca</a>
            </div>
            <div class="col-4">
                <a href="#" class="btn btn-primary btn-lg" role="button" aria-pressed="true">Propozycje</a>
            </div>

        </div>--}}




        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#aktywnosc" aria-expanded="false" aria-controls="aktywnosc">
            Aktywność użytkownika
        </button>



        <div class="collapse" id="aktywnosc">

            <div class="row mt-3 fs-1">

                <div class="col-2 ">
                    <a href="{{route('znalezioneUsera', $user->id)}}" class="btn btn-secondary " role="button" aria-pressed="true">Znalezione ({{$user->znalezione->count()}})</a>

                </div>
                <div class="col-2">
                    <a href="{{route('miejscaUsera', $user->id)}}" class="btn btn-secondary" role="button" aria-pressed="true">Miejsca ({{$user->miejsca->count()}})</a>
                </div>

                <div class="col-2">
                    <a href="{{route('uwagiUsera', $user->id)}}" class="btn btn-secondary" role="button" aria-pressed="true">Uwagi zag. ({{$user->uwagi_zagadnienia->count()}})</a>
                </div>

                <div class="col-2">
                    <a href="{{route('propozycjeUsera', $user->id)}}" class="btn btn-secondary" role="button" aria-pressed="true">Propozycje ({{$user->propozycje->count()}})</a>
                </div>

                <div class="col-2">
                    <a href="{{route('uwagiUsera', $user->id)}}" class="btn btn-secondary" role="button" aria-pressed="true">Uwagi prop. ({{$user->uwagi_propozycje->count()}})</a>
                </div>

            </div>

        </div>
@endif



{{--<div class="wys40"></div>
<div class="wys40"></div>
<button class="btn btn-danger" type="button" data-toggle="collapse" data-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
    Usuwanie
</button>
<div class="collapse" id="usuwanie">
    <div class="wys20"></div>
    <div class="card card-body col-3 text-center">
        <form action="{{route('usunUsera', $user->id)}}" method="post">
            @csrf
            {{method_field('DELETE')}}
           <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń użytkownika</button>


        </form>

    </div>
</div>--}}



@endsection