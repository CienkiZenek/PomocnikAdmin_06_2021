@extends('szablon')
@section('title', 'Działy - edycja')
@section('tresc')



    @include('dodatki.dodal', ['nazwaUsera'=>$dzial->user->name, 'numerUsera'=>$dzial->dodal_user])

    <form action="{{route('dzialyUpdate', $dzial->id)}}" method="POST">
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
                        <option value="Aktywny" @if($dzial->status=='Aktywny') selected @endif>Aktywny</option>
                        <option value="Zawieszony" @if($dzial->status=='Zawieszony') selected @endif>Zawieszony</option>
                        <option value="Roboczy" @if($dzial->status=='Roboczy') selected @endif>Roboczy</option>
                        <option value="Propozycja" @if($dzial->status=='Propozycja') selected @endif>Propozycja</option>
                    </select>
                </div>

            </div>

            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Dział:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('dzial') ? ' is-invalid' : ' ' }}" name="dzial" id="dzial" value="{{$dzial->dzial}}" >
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
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis:">{{$dzial->opis}}</textarea>
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

@if($dzial->kategorie->count()<1)
    <div class="wys40"></div>
    <div class="wys40"></div>

    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunDzialy', $dzial->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń dział</button>


            </form>

        </div>
    </div>

@else
    <div class="wys20 mb-3"></div>
    <div class="row">
        <div class="col-10">
            <h3 class=""><span class="badge bg-secondary">Kategorie dla tego działu:</span></h3>
            <div class="wys20"></div>
            <div class="list-group row">
                @foreach($dzial->kategorie as $kategoria)

                    <div class="col-8 size20"> <a href="{{ route('edycjaKategorie', $kategoria->id) }}" class="list-group-item list-group-item-action">{{ $kategoria->kategoria }}  </a>


                    </div>

                @endforeach


        </div>

        </div>
    </div>


@endif



@endsection