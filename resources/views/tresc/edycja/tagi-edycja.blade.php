@extends('szablon')
@section('title', 'Tagi - edycja')
@section('tresc')



    @include('dodatki.dodal', ['nazwaUsera'=>$tag->user->name, 'numerUsera'=>$tag->dodal_user])
    <form action="{{route('tagiUpdate', $tag->id)}}" method="POST">
        @csrf
        <div class="wys15"></div>


        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{$tag->nazwa}}" >
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

    <div class="mt-5"></div>
    <div class="mt-5"></div>
    <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunTagi', $tag->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń tag</button>


            </form>

        </div>
    </div>




@endsection