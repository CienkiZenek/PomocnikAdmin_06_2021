@extends('szablon')
@section('title', 'Przekaz dnia - edycja')
@section('tresc')

    <form action="{{route('PrzekazDniaUpdate', $przekaz->id)}}" method="POST">
        @csrf


        <div class="row mt-3">
            <div class="col-4">



            </div>
            <div class="col-4">

            </div>

            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Roboczy" @if($przekaz->status=='Roboczy') selected @endif>Roboczy</option>
                        <option value="Opublikowany" @if($przekaz->status=='Opublikowany') selected @endif>Opublikowany</option>
                        <option value="Zawieszony" @if($przekaz->status=='Zawieszony') selected @endif>Zawieszony</option>
                        <option value="Archiwum" @if($przekaz->status=='Archiwum') selected @endif>Archiwum</option>

                    </select>
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" name="tytul" id="tytul" value="{{$przekaz->tytul}}" >
                </div>

            </div>
        </div>



        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nagłowek:</span>
                    </div>
                    <textarea class="form-control" name="naglowek" id="naglowek" aria-label="Nagłowek:">{{$przekaz->naglowek}}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="10" name="tresc" id="tresc" aria-label="Treść:">{{$przekaz->tresc}}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Ramka 1:</span>
                    </div>
                    <textarea class="form-control" name="ramka1" id="ramka1" aria-label="Ramka 1:">{{$przekaz->ramka1}}</textarea>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Ramka 2:</span>
                    </div>
                    <textarea class="form-control" name="ramka2" id="ramka2" aria-label="Ramka 2:">{{$przekaz->ramka2}}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </div>

        </div>

    </form>


    <button class="btn btn-danger mb-3 mt-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse" id="usuwanie">

        <div class="card card-body col-3 text-center">
            <form action="{{route('usunPrzekazDnia', $przekaz->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń przekaz</button>


            </form>

        </div>
    </div>
{{-- TAGI--}}
    <div class="row mt-3 mb-5" >
        <div class="col-12 text-center mb-3">
            <h3><span class="badge bg-secondary">Tagi (słowa kluczowe)</span></h3>
        </div>
        <div class="col-6 ">
            <ul class="list-group">
                @if($przekaz->tagi->count()>0)

                    @foreach($przekaz->tagi as $tag)

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $tag->nazwa }}
                            <span class="badge bg-secondary usunTagPrzekaz" id="{{$tag->id}}"
                                  data-bs-toggle="tooltip" data-bs-placement="right" title="Usuń tag"
                            >X</span>
                        </li>

                    @endforeach
            </ul>
            @endif

        </div>

        <div class="col-6">

            <input id="przekazdnia_id" name="przekazdnia_id" type="hidden" value="{{$przekaz->id}}">
            <div class="input-group">
                <select class="form-control" id="tagi_dodaj_przekaz" name="tagi_dodaj_przekaz" aria-label="tagi_dodaj_przekaz" aria-describedby="dodaj_Tag_przekaz">
                    @foreach($tagi as $tag)
                        <option value="{{$tag->id}}"
                                @if($przekaz->tagi->contains('id', $tag->id))
                                disabled
                                @endif
                        >{{$tag->nazwa}}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="dodajTagPrzekaz">Dodaj tag</button>
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