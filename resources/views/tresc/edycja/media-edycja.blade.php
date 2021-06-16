@extends('szablon')
@section('title', 'Media - edycja')
@section('tresc')

   {{-- @include('dodatki.dodal', ['nazwaUsera'=>$medium->user->name, 'numerUsera'=>$tag->dodal_user])--}}
    <form action="{{route('mediaUpdate', $medium->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="wys15"></div>


        <div class="wys15"></div>
        <div class="row">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nazwa:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa" value="{{$medium->nazwa}}" >
                </div>

            </div>
            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Dodaj logo:</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logo" lang="pl_Pl">

                        <label class="custom-file-label" for="mem" data-browse="Pobierz">Wybierz logo...</label>

                    </div>

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
                    <input type="url" class="form-control" name="link" id="link" value="{{$medium->link}}" >
                </div>


            </div>
            <div class="col-2">
                <a href="{{$medium->link}}" class="btn btn-primary " target="_blank">Zobacz</a>
            </div>

        </div>
        @if(isset($medium->logo))
        <div class="wys15"></div>

        <div class="row">
            <div class="col-12 text-center">
                <figure class="figure">
                    <a href="/{{$medium->logo}}" data-lightbox="example-1"><img src="/{{$medium->logo}}" class="figure-img img-fluid rounded" alt="..."></a>
                    <figcaption class="figure-caption">{{$medium->nazwa}}</figcaption>
                </figure>
            </div>
        </div>
        @endif
        <div class="wys15"></div>


        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </div>

        </div>

    </form>
   {{--<form action="{{route('usunMedia', $medium->id)}}" method="post">
       @csrf
       {{method_field('DELETE')}}
       <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń medium</button>


   </form>--}}
    <div class="wys40"></div>
   <button class="btn btn-danger mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">
        <div class="wys20"></div>
        <div class="card card-body col-3 text-center">
            <form action="{{route('usunMedia', $medium->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń medium</button>


            </form>

        </div>
    </div>
   <div class="wys40"></div>
   <div class="wys40"></div>
   <div class="wys40"></div>
   <div class="wys40"></div>
   <div class="wys40"></div>





@endsection