@extends('szablon')
@section('title', 'Nowa kategoria')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('kategorieZapisNowe')}}" method="POST">
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
                        <span class="input-group-text" id="dzial1">Dział:</span>
                    </div>
                   {{-- {{$Wyniki}}--}}

                    <select class="form-control{{ $errors->has('dzial_id') ? ' is-invalid' : '' }}" id="dzial_id" name="dzial_id" aria-label="dzial_id" aria-describedby="dzial1">
                        <option value="0" disabled selected>Wybierz dział:</option>
                        @foreach($Wyniki as $dzial)

                        <option value="{{$dzial->id}}" >{{$dzial->dzial}}</option>

                        @endforeach
                    </select>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Kategoria:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('kategoria') ? ' is-invalid' : '' }}" value="{{ old('kategoria') }}" name="kategoria" id="kategoria" placeholder="Kategoria..." >
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