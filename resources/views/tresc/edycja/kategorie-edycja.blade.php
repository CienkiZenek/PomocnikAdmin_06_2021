@extends('szablon')
@section('title', 'Kategorie - edycja')
@section('tresc')

@include('dodatki.dodal', ['nazwaUsera'=>$kat->user->name, 'numerUsera'=>$kat->dodal_user])

    <form action="{{route('kategorieUpdate', $kat->id)}}" method="POST">
        @csrf
        <div class="wys15"></div>


        <div class="wys15"></div>
        <div class="row">

            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Aktywny" @if($kat->status=='Aktywny') selected @endif>Aktywny</option>
                        <option value="Zawieszony" @if($kat->status=='Zawieszony') selected @endif>Zawieszony</option>
                        <option value="Roboczy" @if($kat->status=='Roboczy') selected @endif>Roboczy</option>
                        <option value="Propozycja" @if($kat->status=='Propozycja') selected @endif>Propozycja</option>
                    </select>
                </div>

            </div>

            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Dział:</span>
                    </div>
                    <select class="form-control{{ $errors->has('dzial_id') ? ' is-invalid' : '' }}" id="dzial_id" name="dzial_id" aria-label="dzial_id" aria-describedby="dzial1">

                        @foreach($dzialy as $dzial)

                            <option value="{{$dzial->id}}" @if($kat->dzial_id==$dzial->id) selected @endif>{{$dzial->dzial}}</option>

                        @endforeach


                    </select>
                </div>

            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Kategoria:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('kategoria') ? ' is-invalid' : ' ' }}" name="kategoria" id="kategoria" value="{{$kat->kategoria}}" >
                </div>
            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis:">{{$kat->opis}}</textarea>
                </div>

            </div>
        </div>


        <div class="wys15"></div>

        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </div>

        </div>

    </form>
@if($kat->hasla->count()<1)
    <div class="wys40"></div>
    <div class="wys40"></div>
    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunKategorie', $kat->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń kategorie</button>


            </form>

        </div>
    </div>


@else
    <div class="wys20 mb-3"></div>
    <div class="row">
        <div class="col-10">
            <h3 class=""><span class="badge bg-secondary">Hasła w tej ktaegorii:</span></h3>
            <div class="wys20"></div>
            <div class="list-group row">
                @foreach($kat->hasla as $haslo)

                    <div class="col-8 size20"> <a href="{{ route('edycjaHasla', $haslo->id) }}" class="list-group-item list-group-item-action">{{ $haslo->haslo }}  </a>


                    </div>

                @endforeach


            </div>

        </div>
    </div>



@endif



@endsection