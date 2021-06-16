@extends('szablon')
@section('title', 'Info - edycja')
@section('tresc')



   <div class="row">
       <div class="col-4  alert alert-dark">Dodano przez: <a href="/user/{{$info->user->id}}">{{$info->user->name}}</a></div>
       <div class="col-4  alert alert-dark">Dodano: {{$info->created_at->format('Y.m.d')}}</div>
       <div class="col-4  alert alert-dark">Zmieniono: {{$info->updated_at->format('Y.m.d')}}</div>
    </div>
    <form action="{{route('infoUpdate', $info->id)}}" method="POST">
        @csrf


        <div class="row">
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="rodzaj1">Rodzaj:</span>
                    </div>
                    <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
                        <option value="Forum" @if($info->rodzaj=='Forum') selected @endif>Forum</option>
                        <option value="Wiadomość" @if($info->rodzaj=='Wiadomość') selected @endif>Wiadomość</option>
                        <option value="Inny" @if($info->rodzaj=='Inny') selected @endif>Inny</option>
                    </select>
                </div>

            </div>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control" name="tytul" id="tytul" value="{{$info->tytul}}" >
                </div>
            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link:</span>
                    </div>
                    <input type="url" class="form-control" name="link" id="link" value="{{$info->link}}" >
                </div>

            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nagłówek:</span>
                    </div>
                    <textarea class="form-control" name="naglowek" id="naglowek" rows="3">{{$info->naglowek}}</textarea>
                </div>

            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" name="tresc" id="tresc" rows="8">{{$info->tresc}}</textarea>
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

    <div class="wys20"></div>
   <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunInfo', $info->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń info</button>


            </form>

        </div>
    </div>




@endsection