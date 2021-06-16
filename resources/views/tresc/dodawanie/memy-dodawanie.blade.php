@extends('szablon')
@section('title', 'Nowy mem')
@section('tresc')

<div class="row">

</div>
    <form action="{{route('memyZapisNowe')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="wys15 mb-3"></div>

        <div class="row">
            <div class="col-6">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>


                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Roboczy" >Roboczy</option>
                        <option value="Opublikowany" >Opublikowany</option>
                        <option value="Zawieszony" >Zawieszony</option>

                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group">
                    {{--<div class="input-group-prepend">
                        <span class="input-group-text" >Dodaj mema:</span>
                    </div>--}}
                    <div class="custom-file">

                        <div class="mb-3">
                            <input type="file" class="form-control {{ $errors->has('mem') ? ' is-invalid' : ' ' }}" aria-label="file example" id="mem" name="mem" lang="pl_Pl" required>
                            <div class="invalid-feedback"> Wybierz plik mema!</div>
                        </div>
                    </div>
                    <div class="invalid-feedback">Dodaj mema!</div>
                </div>
            </div>

        </div>
        <div class="mb-3"></div>
        <div class="row">
            <div class="col-12">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Tytuł:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('tytul') ? ' is-invalid' : ' ' }}" value="{{ old('tytul') }}" name="tytul" id="tytul" placeholder="Tytuł..." >
                    <div class="invalid-feedback">
                        Wprowadź tytuł!
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Podpis:</span>
                    </div>
                    <input type="text" class="form-control{{ $errors->has('podpis') ? ' is-invalid' : ' ' }}" value="{{ old('podpis') }}" name="podpis" id="podpis" placeholder="Podpis..." >
                    <div class="invalid-feedback">
                        Wprowadź podpis!
                    </div>
                </div>

            </div>
        </div>

        <div class="row mt-3">
            <div class="col-12">


            </div>
        </div>



        <div class="row mt-3 mb-3">
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Dodaj nowego mema!</button>
            </div>

        </div>


    </form>

    </div>
</div>




@endsection