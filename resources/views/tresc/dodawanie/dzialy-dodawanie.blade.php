@extends('szablon')
@section('title', 'Nowy dział')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('dzialyZapisNowe')}}" method="POST">
        @csrf

        <div class="wys15"></div>
        <div class="row">


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
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Dział:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('dzial') ? ' is-invalid' : ' ' }}" name="dzial" id="dzial" value="{{ old('dzial') }}" placeholder="Dział..." >
                </div>

            </div>
        </div>
        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Opis:</span>
                    </div>
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis:" placeholder="Opis...">{{ old('opis') }}</textarea>
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