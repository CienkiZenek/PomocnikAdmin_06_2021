<a id="przypisy"/>

<div class="row mt-3 p-2 tlo-szare3 rounded" id="przyp">
    <div class="col-12 mt-2 text-center fs-5">Przypisy (do rozszerzenia)</div>
    @foreach($przypisy as $przypis)
        <div class="col-8 border-bottom border-secondary">{{$przypis->numer}} -> {{$przypis->tresc}}</div>
        <div class="col-4 border-bottom border-secondary text-end"><form action="{{route('usunPrzypisy', ['id'=>$przypis->id])}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" >Usuń</button>
            </form>
        </div>
    @endforeach
</div>
<form action="{{route('PrzypisyZapisNowe')}}" class="row mb-3 p-2 tlo-szare3 rounded " method="POST" method="POST" enctype="multipart/form-data">
    @csrf
<div class="col-10">
    <input type="text" class="form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc"
           value="{{ old('tresc') }}" placeholder="Przypis..." >
</div>
    <div class="col-2">
        <input type="number" class="form-control{{ $errors->has('numer') ? ' is-invalid' : ' ' }}" name="numer" id="numer"
               value="{{ old('numer') }}" placeholder="Numer..." >
    </div>
    <input type="hidden" name="id_pozycja" value="{{$zagadnienie->id}}"/>
    <input type="hidden" name="dodal_user" value="1"/>
        <button type="submit" class="btn btn-primary col-4 offset-2 mt-2">Dodaj nowy przypis</button>
    </form>
