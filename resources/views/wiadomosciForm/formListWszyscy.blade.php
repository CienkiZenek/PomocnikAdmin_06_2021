@extends('szablon')
@section('title', 'Do wszystkich')
@section('tresc')

    <div class="row">
<div class="col-4 offset-2">List do wszystkich </div></div>


    <form action="{{route('ListWszyscyWy')}}" method="POST">
        @csrf

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Treść listu:</span>
                    </div>

                    <textarea class="form-control"  name="tresc" id="tresc"
                              value="{{ old('nazwa') }}" rows="7"></textarea>


                </div>
                <div class="invalid-tooltip">
                    Please choose a unique and valid username.
                </div>

            </div>
        </div>



        <div class="row mt-3 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Wyślij</button>
            </div>

        </div>


    </form>

@endsection