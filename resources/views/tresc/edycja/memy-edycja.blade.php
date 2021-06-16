@extends('szablon')
@section('title', 'Memy - edycja')
@section('tresc')



    @include('dodatki.dodal', ['nazwaUsera'=>$mem->user->name, 'numerUsera'=>$mem->dodal_user])

    <form action="{{route('memyUpdate', $mem->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="wys15"></div>

        <div class="row">
            <div class="col-6 offset-3 text-center">
                <figure class="figure">
                    <a href="{{$mem->Urlmem}}" data-lightbox="example-1"><img src="{{$mem->Urlmem}}" class="figure-img img-fluid rounded" alt="..."></a>
                    <figcaption class="figure-caption">{{$mem->podpis}}</figcaption>
                </figure>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Roboczy" @if($mem->status=='Roboczy') selected @endif>Roboczy</option>
                        <option value="Opublikowany" @if($mem->status=='Opublikowany') selected @endif>Opublikowany</option>
                        <option value="Zawieszony" @if($mem->status=='Zawieszony') selected @endif>Zawieszony</option>
                        </select>
                </div>

            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="custom-file">

                        <div class="mb-3">
                            <input type="file" class="form-control " aria-label="mem-plik" id="mem" name="mem" lang="pl_Pl">

                        </div>
                    </div>
                    <div class="invalid-feedback">Dodaj mema!</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" value="{{$mem->tytul}}" name="tytul" id="tytul" placeholder="Tytuł..." >
                    <div class="invalid-feedback">
                        Wprowadź tytuł!
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Podpis:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('podpis') ? ' is-invalid' : ' ' }}" name="podpis" id="podpis" value="{{$mem->podpis}}" >
                    <div class="invalid-feedback">
                        Wprowadź podpis!
                    </div>
                </div>

            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">

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
            <form action="{{route('usunMemy', $mem->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń mema</button>


            </form>

        </div>
    </div>




@endsection