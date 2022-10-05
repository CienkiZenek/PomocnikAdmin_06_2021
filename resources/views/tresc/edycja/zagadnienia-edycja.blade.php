@extends('szablon')
@section('title', 'Zagadnienie - edycja')
@section('tresc')

@include('dodatki.dodal', ['nazwaUsera'=>$zagadnienie->user->name, 'numerUsera'=>$zagadnienie->dodal_user])





    <form action="{{route('zagadnieniaUpdate', $zagadnienie->id)}}" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row mt-3">
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Aktywny" @if($zagadnienie->status=='Aktywny') selected @endif>Aktywny</option>
                        <option value="Zawieszony" @if($zagadnienie->status=='Zawieszony') selected @endif>Zawieszony</option>
                        <option value="Roboczy" @if($zagadnienie->status=='Roboczy') selected @endif>Roboczy</option>
                        <option value="Propozycja" @if($zagadnienie->status=='Propozycja') selected @endif>Propozycja</option>
                    </select>
                </div>

            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="zajawka_pokaz1">Zajawka na stronie głównej:</span>
                    </div>
                    <select class="form-control" id="zajawka_pokaz" name="zajawka_pokaz" aria-label="zajawka_pokaz" aria-describedby="zajawka_pokaz1">
                        <option value="Tak" @if($zagadnienie->zajawka_pokaz=='Tak') selected @endif>Tak</option>
                        <option value="Nie" @if($zagadnienie->zajawka_pokaz=='Nie') selected @endif>Nie</option>

                    </select>
                </div>

            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Procent wypełnienia:</span>
                    </div>
                    <input type="number" class="form-control {{ $errors->has('procent_tresci') ? ' is-invalid' : '' }}" required max="100" name="procent_tresci" id="procent_tresci" value="{{$zagadnienie->procent_tresci}}" >
                </div>
        </div>
        </div>




        <div class="row mt-3">
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Dział:</span>
                    </div>
                    <select class="form-control" id="dzial_id" name="dzial_id" aria-label="dzial_id" aria-describedby="dzial1">

                        @foreach($dzialy as $dzial)

                            <option value="{{$dzial->id}}" @if($zagadnienie->dzial_id==$dzial->id) selected @endif>{{$dzial->dzial}}</option>

                        @endforeach


                    </select>
                    <div class="invalid-feedback">
                        Wybierz dział!
                    </div>
                </div>


            </div>
            <div class="col-4">

            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="kategoria1">Kategoria:</span>
                </div>
                <select class="form-control{{ $errors->has('kategoria_id') ? ' is-invalid' : ' ' }}" id="kategoria_id" name="kategoria_id" aria-label="kategoria_id" aria-describedby="kategoria1">
                   {{-- <option value="0" disabled>Wybierz kategorie:</option>--}}
                    @foreach($kategorie as $kategoria)

                        <option value="{{$kategoria->id}}" @if($zagadnienie->kategoria_id==$kategoria->id) selected @endif>{{$kategoria->kategoria}}</option>

                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Wybierz kategorie!
                </div>
            </div>
            </div>

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="kategoria1">Hasło:</span>
                    </div>
                    <select class="form-control{{ $errors->has('haslo_id') ? ' is-invalid' : '' }}" id="haslo_id" name="haslo_id" aria-label="haslo_id" aria-describedby="haslo1">
                        {{-- <option value="0" disabled>Wybierz kategorie:</option>--}}
                        @foreach($hasla as $haslo)

                            <option value="{{$haslo->id}}" @if($zagadnienie->haslo_id==$haslo->id) selected @endif>{{$haslo->haslo}}</option>

                        @endforeach
                    </select>
                    <div class="invalid-feedback">
                        Wybierz hasło!
                    </div>
                </div>
            </div>


        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Zagadnienie:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('zagadnienie') ? ' is-invalid' : '' }}" name="zagadnienie" id="zagadnienie" value="{{$zagadnienie->zagadnienie}}" >
                    <div class="invalid-feedback">
                        Wpisz tytuł zagadnienia!
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Zajawka:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('zajawka') ? ' is-invalid' : '' }}" rows="3" name="zajawka" id="zajawka" aria-label="Zajawka:" maxlength="200">{{$zagadnienie->zajawka}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >W skrócie:</span>
                    </div>
                    <textarea class="form-control{{ $errors->has('w_skrocie') ? ' is-invalid' : '' }}" rows="3" name="w_skrocie" id="w_skrocie" aria-label="W skrócie:" >{{$zagadnienie->w_skrocie}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="8" name="tresc" id="tresc" aria-label="Treść:">{{$zagadnienie->tresc}}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Rozszerzenie:</span>
                    </div>
                    <textarea class="form-control" rows="12" name="rozszerz" id="rozszerz" aria-label="Treść:">{{$zagadnienie->rozszerz}}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Treść linku do słownika (pdf):</span>
                    </div>
                    <input type="text" class="form-control"  name="trescLinku"  id="trescLinku" value="{{$zagadnienie->trescLinku}}" placeholder="Treść linku do słownika (Pdf)..." >
                </div>
            </div>
            <div class="col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Link do słownika (pdf):</span>
                    </div>
                    <input type="text" class="form-control"  name="linkSlownikPdf"  id="linkSlownikPdf" value="{{$zagadnienie->linkSlownikPdf}}" placeholder="Link do słownika (Pdf)..." >
                </div>



            </div>
        </div>


        {{--Dodawanie obrazków--}}
        <div class="row mt-3">
{{--Obrazek 1--}}
            <div class="col-6">
                <div class="tlo-szare8  p-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Dodaj/Zmień obrazek 1:</span>
                    </div>
                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="obrazek1" name="obrazek1" lang="pl_Pl" value="{{$zagadnienie->obrazek1}}">
                        {{--<label class="custom-file-label" for="dodajObrazek1" data-browse="Pobierz">Wybierz obrazek...</label>--}}
                    </div>
                </div>
                    @php  $dlugosc1 = Str::length($zagadnienie->obrazek1) @endphp
                    @if($dlugosc1>3)
                        <a href="{{$zagadnienie->urlobrazek1}}" data-lightbox="obrazek1" data-title="">
                            <img src="{{$zagadnienie->urlobrazek1}}" class="img-thumbnail" alt="{{$zagadnienie->tytulObrazek1}}"></a>
                    @endif

                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł obrazek1:</span>
                    </div>
                    <input type="text" class="form-control" name="tytulObrazek1" id="tytulObrazek1" value="{{$zagadnienie->tytulObrazek1}}" >
                </div>

                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Podpis obrazek1:</span>
                    </div>
                    <input type="text" class="form-control" name="podpisObrazek1" id="podpisObrazek1" value="{{$zagadnienie->podpisObrazek1}}" >
                </div>
                </div>
            </div>
            {{--Obrazek 1--}}
            <div class="col-6">
                <div class="tlo-szare8  p-1">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Dodaj/Zmień obrazek 2:</span>
                    </div>
                    <div class="custom-file mt-3">
                        <input type="file" class="custom-file-input" id="obrazek2" name="obrazek2"  value="{{$zagadnienie->obrazek2}}" lang="pl_Pl">
                        {{--<label class="custom-file-label" for="dodajObrazek2" data-browse="Pobierz">Wybierz obrazek...></label--}}
                    </div>
                </div>
                    @php  $dlugosc2 = Str::length($zagadnienie->obrazek2) @endphp
                    @if($dlugosc2>3)
                        <a href="{{$zagadnienie->urlobrazek2}}" data-lightbox="obrazek2" data-title="">
                            <img src="{{$zagadnienie->urlobrazek2}}" class="img-thumbnail" alt="{{$zagadnienie->tytulObrazek2}}"></a>

                    @endif
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł obrazek2:</span>
                    </div>
                    <input type="text" class="form-control" name="tytulObrazek2" id="tytulObrazek2" value="{{$zagadnienie->tytulObrazek2}}" >
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Podpis obrazek2:</span>
                    </div>
                    <input type="text" class="form-control" name="podpisObrazek2" id="podpisObrazek2" value="{{$zagadnienie->podpisObrazek2}}" >
                </div>

            </div>

            </div>
        </div>


{{-- Moduł z pokazywaniem obrazków - widoczny tylko, gdy jest jakiś obrazek--}}


        <div class="row mt-3 mb-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj zagadnienie</button>
            </div>

        </div>

    </form>

{{-- Moduł z dodawaniem przypisów do zagadnienia --}}


@livewire('przypisy-modul', ['przypisy' => $przypisy, 'id_pozycja'=>$zagadnienie->id])

{{--@include('dodatki.przypisy')--}}

{{-- Moduł z dodawaniem bibliografii, linkow i plików--}}
@include('dodatki.bibl-plik-link', ['dzial'=>'zagadnienia'])

{{--Tagi (słowa kluczowe)--}}


<div class="row mt-3 mb-5" >
    <div class="col-12 text-center mb-3">
        <h3><span class="badge bg-secondary">Tagi (słowa kluczowe dla <i>{{$zagadnienie->zagadnienie}}</i>)</span></h3>
    </div>
    <div class="col-6 ">
        <ul class="list-group">
        @if($zagadnienie->tagi->count()>0)

                @foreach($zagadnienie->tagi as $tag)

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $tag->nazwa }}
                        <span class="badge bg-secondary usunTag" id="{{$tag->id}}"
                              data-bs-toggle="tooltip" data-bs-placement="right" title="Usuń tag"
                        >X</span>
                    </li>

            @endforeach
        </ul>
@endif

    </div>

    <div class="col-6">

        <input id="zagadnienia_id" name="zagadnienia_id" type="hidden" value="{{$zagadnienie->id}}">
        <div class="input-group">
                       <select class="form-control" id="tagi_dodaj" name="tagi_dodaj" aria-label="tagi_dodaj" aria-describedby="dodaj_Tag">
                @foreach($tagi as $tag)
                    <option value="{{$tag->id}}"
                    @if($zagadnienie->tagi->contains('id', $tag->id))
                    disabled
                            @endif
                    >{{$tag->nazwa}}</option>
                @endforeach
            </select>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="dodajTag">Dodaj tag</button>
            </div>
        </div>

    </div>

</div>
{{--Kotwica przydatna prze przełdowywaniu strony przy dodawania tagów--}}
<a href="#tagi" id="tagiLista">
</a>
{{-- Skrypt wywoływany gdy następuje odświerzenie strony po dodaniu/odłączeniu tagu --}}
@if(isset($tagiZmiana))
    <script>
        // window.location.hash = "#tagi";
        // window.location.hash = '#tagi';
        var tagObszar = document.getElementById("tagiLista");
        tagObszar.scrollIntoView();
    </script>
@endif

@endsection
