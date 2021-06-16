@extends('szablon')
@section('title', 'Nowe zagadnienie')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('zagadnieniaZapisNowe')}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Aktywny">Aktywny</option>
                        <option value="Zawieszony">Zawieszony</option>
                        <option value="Roboczy" selected>Roboczy</option>
                        <option value="Propozycja">Propozycja</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Dział:</span>
                    </div>
                    <select class="form-control{{ $errors->has('dzial_id') ? ' is-invalid' : '' }}" id="dzial_id" name="dzial_id" aria-label="dzial_id" aria-describedby="dzial1">
                        <option value="0" disabled selected>Wybierz dział:</option>
                        @foreach($dzialy as $dzial)

                            <option value="{{$dzial->id}}" >{{$dzial->dzial}}</option>
                        @endforeach

                    </select>
                    <div class="invalid-feedback">
                        Wybierz dział!
                    </div>
                </div>


            </div>
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="kategoria1">Kategoria:</span>
                    </div>
                    <select class="form-control{{ $errors->has('kategoria_id') ? ' is-invalid' : '' }}" id="kategoria_id" name="kategoria_id" aria-label="kategoria_id" aria-describedby="kategoria1">
                         <option value="0" disabled selected>Wybierz kategorie:</option>
                    </select>
                    <div class="invalid-feedback">
                        Wybierz kategorie!
                    </div>
                </div>
            </div>

            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="haslo1">Hasło:</span>
                    </div>
                    <select class="form-control{{ $errors->has('haslo_id') ? ' is-invalid' : '' }}" id="haslo_id" name="haslo_id" aria-label="haslo_id" aria-describedby="haslo1">
                        <option value="0" disabled selected>Wybierz hasło:</option>
                    </select>
                    <div class="invalid-feedback">
                        Wybierz hasło!
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Zagadnienie:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('zagadnienie') ? ' is-invalid' : '' }}" value="{{ old('zagadnienie') }}" name="zagadnienie" id="zagadnienie" >
                    <div class="invalid-feedback">
                        Wpisz tytuł zagadnienia!
                    </div>

                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Zajawka:</span>
                    </div>
                    <textarea class="form-control" rows="2" name="zajawka" id="zajawka" aria-label="Zajawka:">{{ old('zajawka') }}</textarea>
                </div>

            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Treść:</span>
                    </div>
                    <textarea class="form-control" rows="8" name="tresc" id="tresc" aria-label="Treść:">{{ old('tresc') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Rozszerzenie:</span>
                    </div>
                    <textarea class="form-control" rows="12" name="rozszerz" id="rozszerz" aria-label="Rozszerzenie:">{{ old('rozszerz') }}</textarea>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Link do słownika (html):</span>
                    </div>
                    <input type="text" class="form-control"  name="linkSlownikHtml"  id="linkSlownikHtml"  placeholder="Link do słownika (html)..." >
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"  >Link do słownika (pdf):</span>
                    </div>
                    <input type="text" class="form-control"  name="linkSlownikPdf"  id="linkSlownikPdf"  placeholder="Link do słownika (Pdf)..." >
                </div>
            </div>
        </div>



        <div class="row mt-5 mb-5">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz zagadnienie</button>
            </div>

        </div>


    </form>

    </div>
</div>




@endsection