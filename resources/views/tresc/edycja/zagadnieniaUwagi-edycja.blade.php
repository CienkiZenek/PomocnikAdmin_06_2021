@extends('szablon')
@section('title', 'Zagadnienia:Uwagi - edycja')
@section('tresc')


    <form action="{{route('zagadnieniaUwagiUpdate', $uwaga->id)}}" method="POST">
        @csrf
        <div class="row mt-3 ">
            <div class="col-6">

                @include('dodatki.dodal', ['user'=>$user])

            </div>

            <div class="col-3">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Nowa" @if($uwaga->status=='Nowa') selected @endif>Nowa</option>
                        <option value="Wykorzystana" @if($uwaga->status=='Wykorzystana') selected @endif>Wykorzystana</option>
                        <option value="Oczekuje" @if($uwaga->status=='Oczekuje') selected @endif>Oczekuje</option>
                        <option value="Archiwalna" @if($uwaga->status=='Archiwalna') selected @endif>Archiwalna</option>
                        <option value="Usunięta" @if($uwaga->status=='Usunięta') selected @endif>Usunięta</option>
                    </select>
                </div>

            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-primary">Zmień status</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 offset-2">
                <div class="fs-5">
                    @if($uwagaDo=='zagadnienie')
                    <span class="badge bg-secondary">Uwaga do zagadnienia: </span> <a href="{{route('edycjaZagadnienia',$zagadnienie->id )}}" class="link-primary">{{$zagadnienie->zagadnienie}}</a>
                    @endif

                        @if($uwagaDo=='haslo')
                            <span class="badge bg-secondary">Uwaga do hasła: </span> <a href="{{route('edycjaHasla',$haslo->id )}}" class="link-primary">{{$haslo->haslo}}</a>
                        @endif

                </div>
        </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
<div class="fs-5">
    {{$uwaga->naglowek}}

</div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-8 offset-2">
                <div class="lh-2 fs-5 t_justify p-3 tlo-szare1">
                    {{$uwaga->tresc}}
                </div>
            </div>
        </div>
    </form>

<button class="btn btn-danger mt-5 mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse " id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('usunZagadnieniaUwagi', $uwaga->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń uwagę</button>

            </form>
        </div>
    </div>
@endsection
