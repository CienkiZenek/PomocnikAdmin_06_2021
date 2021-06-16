@extends('szablon')
@section('title', 'Miejsca - edycja')
@section('tresc')



    @include('dodatki.dodal', ['user'=>$user])

    <form action="{{route('miejscaUpdate', $miejsce->id)}}" method="POST">
        @csrf
        <div class="wys15"></div>

        <div class="row">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj1">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="Forum" @if($miejsce->rodzaj=='Forum') selected @endif>Forum</option>
                        <option value="Wiadomość" @if($miejsce->rodzaj=='Wiadomość') selected @endif>Wiadomość</option>
                        <option value="Inne" @if($miejsce->rodzaj=='Inne') selected @endif>Inne</option>
                    </select>
                </div>

            </div>
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Medium:</span>
                    </div>

                    <select class="form-control{{ $errors->has('media_id') ? ' is-invalid' : ' ' }}" id="media_id" name="media_id" aria-label="dzial_id" aria-describedby="dzial1">
                        {{--<option value="0" disabled selected>Wybierz medium:</option>--}}
                        @foreach($Media as $medium)

                            <option value="{{$medium->id}}" @if($miejsce->media_id==$medium->id) selected @endif>{{$medium->nazwa}}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Aktywne" @if($miejsce->status=='Aktywne') selected @endif>Aktywne</option>
                        <option value="Wstrzymane" @if($miejsce->status=='Wstrzymane') selected @endif>Wstrzymane</option>
                        <option value="Archiwum" @if($miejsce->status=='Archiwum') selected @endif>Archiwum</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$miejsce->tytul}}" >
                </div>

            </div>
        </div>

        <div class="wys15"></div>
        <div class="row">
            <div class="col-10">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link:</span>
                    </div>
                    <input type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : ' ' }}" name="link" id="link" value="{{$miejsce->link}}" >
                </div>


            </div>
            <div class="col-2">
                 <a href="{{$miejsce->link}}" class="btn btn-primary " target="_blank">Zobacz</a>
            </div>

        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis:">{{$miejsce->opis}}</textarea>
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

    <div class="wys40"></div>
    <div class="wys40"></div>
    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunMiejsce', $miejsce->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń miejsce</button>


            </form>

        </div>
    </div>




@endsection