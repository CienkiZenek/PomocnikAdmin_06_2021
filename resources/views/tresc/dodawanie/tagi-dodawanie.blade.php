@extends('szablon')
@section('title', 'Nowy tag')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('tagiZapisNowe')}}" method="POST">
        @csrf

        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nazwa:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('nazwa') ? ' is-invalid' : ' ' }}" name="nazwa" id="nazwa"
                           value="{{ old('nazwa') }}" >
                </div>
                <div class="invalid-tooltip">
                    Please choose a unique and valid username.
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