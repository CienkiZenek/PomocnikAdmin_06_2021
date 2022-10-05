@extends('szablon')
@section('title', 'Nowy przekaz dnia')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('PrzekazDniaZapisNowe')}}" method="POST">
        @csrf
        <div class="wys15"></div>
        <div class="row">
<div class="col-4">
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="status1">Status:</span>
        </div>


        <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
            <option value="Roboczy" >Roboczy</option>
            <option value="Opublikowany" >Opublikowany</option>
            <option value="Zawieszony" >Zawieszony</option>
            <option value="Archiwum" >Archiwum</option>

        </select>
    </div>


</div>
            <div class="col-4">


            </div>

            <div class="col-4">

            </div>

        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : '' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł..." >
                </div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Nagłówek:</span>
                    </div>
                    <textarea class="form-control" name="naglowek" id="naglowek" aria-label="Nagłówek:">{{ old('naglowek') }}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="10" name="tresc" id="tresc" aria-label="Treść:">{{ old('trec') }}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link (url):</span>
                    </div>
                    <input type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="link" value="{{ old('link') }}" placeholder="Link (url)..." >
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Link (treść):</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('link_tresc') ? ' is-invalid' : '' }}" name="link_tresc" id="link_tresc" value="{{ old('link_tresc') }}" placeholder="Link (treść)..." >
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Ramka 1:</span>
                    </div>
                    <textarea class="form-control" name="ramka1" id="ramka1" aria-label="Ramka 1:">{{ old('ramka1') }}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Ramka 2:</span>
                    </div>
                    <textarea class="form-control" name="ramka2" id="ramka2" aria-label="Ramka 2:">{{ old('ramka2') }}</textarea>
                </div>

            </div>
        </div>


        <div class="row mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="wys15"></div>

    </form>

    </div>
</div>




@endsection
