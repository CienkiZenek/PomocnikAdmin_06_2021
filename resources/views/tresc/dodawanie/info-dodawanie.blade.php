@extends('szablon')
@section('title', 'Nowe info')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('infoZapisNowe')}}" method="POST">
        @csrf

        <div class="row mt-3">
<div class="col-4">

    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text" id="rodzaj1">Rodzaj:</span>
        </div>
        <select class="form-control" id="rodzaj" name="rodzaj" aria-label="rodzaj" aria-describedby="rodzaj1">
            <option value="Forum" >Forum</option>
            <option value="Wiadomość" >Wiadomość</option>
            <option value="Inny" >Inny</option>
        </select>
    </div>

</div>
            <div class="col-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text {{ $errors->has('tytul') ? ' is-invalid' : '' }}" value="{{ old('tytul') }}">Tytuł:</span>
                    </div>
                    <input type="text" class="form-control" name="tytul" id="tytul" placeholder="Tytuł..." >
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" value="{{ old('link') }}">Link:</span>
                    </div>
                    <input type="url" class="form-control" name="link" id="link" placeholder="Link..." >
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Naglowek:</span>
                    </div>
                    <textarea class="form-control" name="naglowek" id="naglowek" rows="3">{{ old('naglowek') }}</textarea>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tresc:</span>
                    </div>
                    <textarea class="form-control" name="tresc" id="tresc" rows="8">{{ old('tresc') }}</textarea>
                </div>

            </div>
        </div>


        <div class="row mb-5 mt-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Zapisz</button>
            </div>

        </div>


    </form>

    </div>
</div>




@endsection