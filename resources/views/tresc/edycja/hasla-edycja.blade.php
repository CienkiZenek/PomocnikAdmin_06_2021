@extends('szablon')
@section('title', 'Hasła - edycja')
@section('tresc')

    {{--{{dd($dzialy)}}--}}
    {{--{{dd($KategorieStartowe)}}--}}
        <form action="{{route('haslaUpdate', $haslo->id)}}" method="POST" >
        @csrf
            <input type="text" hidden name="status" id="status" value="{{$haslo->status}}">
           {{-- {{$haslo->status}}--}}
        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Zmień dział:</span>
                    </div>

                    <select class="form-control{{ $errors->has('dzial_id') ? ' is-invalid' : ' ' }}" id="dzial_id" name="dzial_id" aria-label="dzial_id" aria-describedby="dzial1">
                        <option value="0" disabled>Zmień dział:</option>
                        @foreach($dzialy as $dzial)

                            <option value="{{$dzial->id}}"
                                    @if($haslo->dzial_id==$dzial->id) selected @endif
                            >{{$dzial->dzial}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="kategoria1">Zmień kategorię:</span>
                    </div>
                    <select class="form-control{{ $errors->has('kategoria_id') ? ' is-invalid' : ' ' }}" id="kategoria_id" name="kategoria_id" aria-label="kategoria_id" aria-describedby="kategoria1">
                        <option disabled>Zmień kategorię:</option>


                        @foreach($KategorieStartowe as $kat)

                            <option value="{{$kat->id}}"
                                    @if($haslo->kategoria_id==$kat->id) selected @endif
                            >{{$kat->kategoria}}</option>

                        @endforeach

                    </select>
                    <div class="invalid-feedback">
                        Wybierz kategorie!
                    </div>
                </div>
            </div>
        </div>


        <div class="row  mt-2">

            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Hasło:</span>
                    </div>
                    <input type="text" class="form-control {{ $errors->has('haslo') ? ' is-invalid' : '' }}" name="haslo" id="haslo" value="{{$haslo->haslo}}" >
                </div>
            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Procent wypełnienia:</span>
                    </div>
                    <input type="number" class="form-control {{ $errors->has('procent_tresci') ? ' is-invalid' : '' }}" required max="100" name="procent_tresci" id="procent_tresci" value="{{$haslo->procent_tresci}}" >
                </div>
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" name="tresc" id="tresc" rows="8">{{$haslo->tresc}}</textarea>
                </div>

            </div>
        </div>
            <div class="row mt-3">
                <div class="col-6">

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"  >Treść linku do słownika (pdf):</span>
                        </div>
                        <input type="text" class="form-control"  name="trescLinku"  id="trescLinku" value="{{$haslo->trescLinku}}" placeholder="Treść linku do słownika (Pdf)..." >
                    </div>
                </div>
                <div class="col-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text"  >Link do słownika (pdf):</span>
                        </div>
                        <input type="text" class="form-control"  name="linkSlownikPdf"  id="linkSlownikPdf" value="{{$haslo->linkSlownikPdf}}" placeholder="Link do słownika (Pdf)..." >
                    </div>



                </div>
            </div>
            <div class="row mt-3">
                <div class="col-4  alert alert-dark">Dodano przez: <a href="/user/{{$haslo->user->id}}">{{$haslo->user->name}}</a></div>
                <div class="col-4  alert alert-dark">Dodano: {{$haslo->created_at->format('Y.m.d')}}</div>
                <div class="col-4  alert alert-dark">Zmieniono: {{$haslo->updated_at->format('Y.m.d')}}</div>
            </div>
        <div class="row mt-3 mb-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj hasło</button>
            </div>

        </div>

    </form>
{{-- Moduł z dodawaniem bibliografii, linkow i plików--}}
   @include('dodatki.bibl-plik-link', ['dzial'=>'hasla'])


   {{--<button class="btn btn-danger mt-5 mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie całego hasła
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center mb-5">
            <form action="{{route('usunHaslo', $haslo->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń hasło</button>


            </form>

        </div>
    </div>--}}

    {{--Tagi (słowa kluczowe)--}}


    <div class="row mt-3 mb-5" >
        <div class="col-12 text-center mb-3">
            <h3><span class="badge bg-secondary">Tagi (słowa kluczowe dla: <i>{{$haslo->haslo}}</i>)</span></h3>
        </div>
        <div class="col-6 ">
            <ul class="list-group">
                @if($haslo->tagi->count()>0)

                    @foreach($haslo->tagi as $tag)

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tag->nazwa }}
                            <span class="badge bg-secondary usunTagHaslo" id="{{$tag->id}}"
                                  data-bs-toggle="tooltip" data-bs-placement="right" title="Usuń tag"
                            >X</span>
                        </li>

                    @endforeach
            </ul>
            @endif

        </div>

        <div class="col-6">

            <input id="haslo_id" name="haslo_id" type="hidden" value="{{$haslo->id}}">
            <div class="input-group">
                <select class="form-control" id="tagi_dodaj" name="tagi_dodaj" aria-label="tagi_dodaj" aria-describedby="dodaj_Tag">
                    @foreach($tagi as $tag)
                        <option value="{{$tag->id}}"
                                @if($haslo->tagi->contains('id', $tag->id))
                                disabled
                                @endif
                        >{{$tag->nazwa}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="dodajTagHaslo">Dodaj tag</button>
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