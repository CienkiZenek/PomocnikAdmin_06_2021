{{-- moduł wyśiwtlania i dodawania pozycji bibliograficznych, linków i plików dołaczancyh do haseł i zagadnień --}}
<a id="bibliografia"/>

<div class="row mt-3 p-2 tlo-szare3 rounded" id="bibl">
    <div class="col-12 mt-2 text-center fs-5">Bibliografia</div>
    @foreach($bibliografia as $bibl)
        <div class="col-8 mt-3 border-bottom border-secondary">{{$bibl->tresc}}</div>

        <div class="col-4 border-bottom border-secondary text-end"><form action="{{route('usunBibl', ['id'=>$bibl->id, 'dzial'=>$dzial])}}" method="post">
                @csrf
                {{method_field('DELETE')}}

                <button class="btn btn-danger" >Usuń</button>

            </form>

        </div>

    @endforeach

    <div class="col-12">
        {{-- Formularz dodawania nowej bibliografii--}}
        <form action="{{route('bibliografiaZapisNowe', $dzial)}}" method="POST" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" class="mt-4 mb-2 form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc"
                   value="{{ old('tresc') }}" placeholder="Pozycja bibliograficzna..." >
            <input type="hidden" name="dzial" value="{{$dzial}}"/>
            @if($dzial=='hasla')
                <input type="hidden" name="id_pozycja" value="{{$haslo->id}}"/>
            @else($dzial=='zagadnienia')
                <input type="hidden" name="id_pozycja" value="{{$zagadnienie->id}}"/>
            @endif
            <input type="hidden" name="dodal_user" value="1"/>
            <button type="submit" class="btn btn-primary">Dodaj nową pozycję</button>
        </form>
    </div>
</div>

<a id="linki"/>
<div class="row mt-3 p-2 tlo-szare3 rounded">
    <div class="col-12 mt-2 text-center fs-5">Linki</div>


    @foreach($linki as $link)
        <div class="col-8 mt-3 border-bottom border-secondary"><a href="{{$link->link}}" target="_blank" class="link-primary">{{$link->tresc}}</a></div>
        <div class="col-4 border-bottom border-secondary text-end"><form action="{{route('usunLink', ['id'=>$link->id, 'dzial'=>$dzial])}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" >Usuń link</button>
            </form>
        </div>
    @endforeach


    {{-- Formularz dodawania nowego linku--}}
    <form action="{{route('linkZapisNowe', $dzial)}}" method="POST" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
            <input type="text" class="mt-4 form-control{{ $errors->has('tresc') ? ' is-invalid' : ' ' }}" name="tresc" id="tresc"
                   value="{{ old('tresc') }}" placeholder="Link (treść)..." >

            <input type="hidden" name="dzial" value="{{$dzial}}"/>
            @if($dzial=='hasla')
                <input type="hidden" name="id_pozycja" value="{{$haslo->id}}"/>
            @else($dzial=='zagadnienia')
                <input type="hidden" name="id_pozycja" value="{{$zagadnienie->id}}"/>
            @endif

            <input type="hidden" name="dodal_user" value="1"/>
        </div>
        <div class="col-12">
            <input type="text" class="mt-1 mb-2 form-control{{ $errors->has('link') ? ' is-invalid' : ' ' }}" name="link" id="link"
                   value="{{ old('link') }}" placeholder="Link (url)..." >

            <button type="submit" class="btn btn-primary">Dodaj nowy link</button>
        </div>
    </form>
</div>

<a id="pliki"/>
<div class="row mt-3 p-2 tlo-szare3 rounded">
    <div class="col-12 mt-2 text-center fs-5">Pliki</div>
    @foreach($pliki as $plik)
        <div class="col-8 mt-3 border-bottom border-secondary">
            {{$plik->plik_nazwa}}
        </div>
        <div class="col-4 border-bottom border-secondary text-end"><form action="{{route('usunPlik', ['id'=>$plik->id, 'dzial'=>$dzial])}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" >Usuń plik</button>
            </form>
        </div>
    @endforeach
    <div class="col-12 mt-3">
        {{-- Formularz dodawania nowego pliku--}}
        <form action="{{route('plikZapisNowe', $dzial)}}" method="POST" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <input type="text" class="mt-1 mb-2 form-control{{ $errors->has('plik_nazwa') ? ' is-invalid' : ' ' }}" name="plik_nazwa" id="plik_nazwa"
                       value="{{ old('plik_nazwa') }}" placeholder="Plik (nazwa wyświetlana)..." >
            </div>
            <div class="col-12">
                <input type="file" class="mt-2 mb-3 form-control {{ $errors->has('plik') ? ' is-invalid' : ' ' }}"  id="plik" name="plik" lang="pl_Pl" required>
                <input type="hidden" name="dzial" value="{{$dzial}}"/>
                @if($dzial=='hasla')
                    <input type="hidden" name="id_pozycja" value="{{$haslo->id}}"/>
                @else($dzial=='zagadnienia')
                    <input type="hidden" name="id_pozycja" value="{{$zagadnienie->id}}"/>
                @endif
                <input type="hidden" name="dodal_user" value="1"/>
                <button type="submit" class="btn btn-primary">Dodaj nowy plik</button>
            </div>
        </form>



    </div>

</div>