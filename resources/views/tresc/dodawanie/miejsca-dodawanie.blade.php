@extends('szablon')
@section('title', 'Nowe miejsce dyskusji')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('miejscaZapisNowe')}}" method="POST">
        @csrf
        <div class="wys15"></div>
        <div class="row">
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
            <div class="col-4">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="dzial1">Medium:</span>
                    </div>

                    <select class="form-control{{ $errors->has('media_id') ? ' is-invalid' : ' ' }}" id="media_id" name="media_id" aria-label="dzial_id" aria-describedby="dzial1">
                        <option value="0" disabled selected>Wybierz medium:</option>
                        @foreach($Media as $medium)

                            <option value="{{$medium->id}}" >{{$medium->nazwa}}</option>

                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-4">

            </div>

        </div>

        <div class="wys15"></div>
        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : '' }}" name="tytul" id="tytul" value="{{ old('tytul') }}" placeholder="Tytuł..." >
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
                    <input type="url" class="form-control{{ $errors->has('link') ? ' is-invalid' : '' }}" name="link" id="link" placeholder="Link..." >
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
                    <textarea class="form-control" name="opis" id="opis" aria-label="Opis:">{{ old('opis') }}</textarea>
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