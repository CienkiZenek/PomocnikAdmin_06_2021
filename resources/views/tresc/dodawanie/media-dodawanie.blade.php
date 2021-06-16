@extends('szablon')
@section('title', 'Nowe medium')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('mediaZapisNowe')}}" method="POST" method="POST" enctype="multipart/form-data">
        @csrf


        <div class="row mt-3">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nazwa:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa"
                           value="{{ old('nazwa') }}" placeholder="Nazwa..." >
                </div>
                <div class="invalid-tooltip">
                    Podaj nazwę!
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
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" value="{{ old('link') }}">Link:</span>
                    </div>
                    <input type="url" class="form-control" name="link" id="link" placeholder="Link..." >
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