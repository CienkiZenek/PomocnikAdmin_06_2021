@extends('szablon')
@section('title', 'Nowe hasło')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('haslaZapisNowe')}}" method="POST">
        @csrf

        <div class="row mt-2">

            <div class="col-6">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Aktywny" >Aktywny</option>
                        <option value="Zawieszony" >Zawieszony</option>
                        <option value="Roboczy" >Roboczy</option>
                        <option value="Propozycja" >Propozycja</option>
                    </select>
                </div>

            </div>
            <div class="col-6">

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Dział:</span>
                    </div>

                    <select class="form-control{{ $errors->has('dzial_id') ? ' is-invalid' : ' ' }}" id="dzial_id" name="dzial_id" aria-label="dzial_id" aria-describedby="dzial1">
                        <option value="0" disabled selected>Wybierz dział:</option>
                        @foreach($Wyniki as $dzial)

                            <option value="{{$dzial->id}}" >{{$dzial->dzial}}</option>

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="kategoria1">Kategoria:</span>
                    </div>
                    <select class="form-control{{ $errors->has('kategoria_id') ? ' is-invalid' : ' ' }}" id="kategoria_id" name="kategoria_id" aria-label="kategoria_id" aria-describedby="kategoria1">
                         <option value="0" disabled selected>Wybierz kategorie:</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Hasło:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('haslo') ? ' is-invalid' : '' }}"  name="haslo" value="{{ old('haslo') }}" id="haslo" placeholder="Hasło..." >
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="9" name="tresc" id="tresc" aria-label="Treść:">{{ old('tresc') }}</textarea>
                </div>

            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Link do słownika (html):</span>
                    </div>
                    <input type="text" class="form-control"  name="linkSlownikHtml" value="{{ old('linkSlownikHtml') }}" id="linkSlownikHtml" placeholder="Link do słownika (html)..." >
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Link do słownika (pdf):</span>
                    </div>
                    <input type="text" class="form-control"  name="linkSlownikPdf" value="{{ old('linkSlownikPdf') }}" id="linkSlownikPdf" placeholder="Link do słownika (Pdf)..." >
                </div>
            </div>
        </div>

        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>
        <div class="wys15"></div>

    </form>

    </div>
</div>




@endsection