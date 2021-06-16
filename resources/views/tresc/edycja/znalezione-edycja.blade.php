@extends('szablon')
@section('title', 'Znalezione - edycja')
@section('tresc')



    @include('dodatki.dodal', ['user'=>$user])
    <form action="{{route('znalezioneUpdate', $znal->id)}}" method="POST">
        @csrf


        <div class="row mt-3">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj1">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">

                        <option value="Przeczytaj koniecznie" @if($znal->rodzaj=='Przeczytaj koniecznie') selected @endif>Przeczytaj koniecznie</option>
                        <option value="Warto wiedzieć" @if($znal->rodzaj=='Warto wiedzieć') selected @endif>Warto wiedzieć</option>
                        <option value="Można odnotować" @if($znal->rodzaj=='Można odnotować') selected @endif>Można odnotować</option>
                        <option value="Tak myślą wrogowie" @if($znal->rodzaj=='Tak myślą wrogowie') selected @endif>Tak myślą wrogowie</option>
                        <option value="Ciekawostka" @if($znal->rodzaj=='Ciekawostka') selected @endif>Ciekawostka</option>
                        <option value="Skandal i zgroza" @if($znal->rodzaj=='Skandal i zgroza') selected @endif>Skandal i zgroza</option>


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

                            <option value="{{$medium->id}}" @if($znal->media_id==$medium->id) selected @endif>{{$medium->nazwa}}</option>

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
                        <option value="Aktywne" @if($znal->status=='Aktywne') selected @endif>Aktywne</option>
                        <option value="Wstrzymane" @if($znal->status=='Wstrzymane') selected @endif>Wstrzymane</option>
                        <option value="Archiwum" @if($znal->status=='Archiwum') selected @endif>Archiwum</option>
                    </select>
                </div>


            </div>

        </div>
{{-- fffff--}}
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : '' }}" name="nazwa" id="nazwa" value="{{$znal->nazwa}}" >
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
                    <input type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="link" value="{{$znal->link}}" >
                </div>

            </div>
            <div class="col-2">
                <a href="{{$znal->link}}" class="btn btn-primary " target="_blank">Zobacz</a>
            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Komentarz:</span>
                    </div>
                    <textarea class="form-control" name="komentarz" id="opis" aria-label="komentarz:">{{$znal->komentarz}}</textarea>
                </div>

            </div>
        </div>



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
            <form action="{{route('usunZnalezione', $znal->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń znalezione</button>


            </form>

        </div>
    </div>




@endsection