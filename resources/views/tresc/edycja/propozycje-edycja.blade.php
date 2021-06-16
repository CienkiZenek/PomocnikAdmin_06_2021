@extends('szablon')
@section('title', 'Propozycje - edycja')
@section('tresc')


{{--@if (!isset($user))
{{$user=App\User::findOrFail($propozycja->dodal_user)}}
@endif--}}



    <form action="{{route('propozycjeUpdate', $propozycja->id)}}" method="POST">
        @csrf

{{--<input type="hidden" name="user" value="{{$user}}"/>--}}
        <div class="row mt-3 ">
            <div class="col-6">

                @include('dodatki.dodal', ['user'=>$user])

            </div>



            <div class="col-3">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status1">Status:</span>
                    </div>
                    <select class="form-control" id="status" name="status" aria-label="status" aria-describedby="status1">
                        <option value="Nowa" @if($propozycja->status=='Nowa') selected @endif>Nowa</option>
                        <option value="Wykorzystana" @if($propozycja->status=='Wykorzystana') selected @endif>Wykorzystana</option>
                        <option value="Oczekuje" @if($propozycja->status=='Oczekuje') selected @endif>Oczekuje</option>
                        <option value="Archiwalna" @if($propozycja->status=='Archiwalna') selected @endif>Archiwalna</option>
                        <option value="Usunięta" @if($propozycja->status=='Usunięta') selected @endif>Usunięta</option>
                    </select>
                </div>


            </div>

            <div class="col-3">

                <button type="submit" class="btn btn-primary">Zmień status</button>
            </div>

        </div>

        <div class="row mt-3">
            <div class="col-12">
<div class="fs-5">
    {{$propozycja->naglowek}}

</div>
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-8">
                <div class="lh-2 fs-5 t_justify p-3 tlo-szare1">
                    {{$propozycja->tresc}}
                </div>

            </div>
            <div class="col-4 ">
                <div class="badge bg-warning text-dark fs-5 ">
Uwagi do propozycji:
                </div>


                <div class="input-group mt-3 mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="status2">Wybierz Status uwag:</span>
                    </div>
                    <select class="form-control" id="status_uwag" name="status_uwag" aria-label="status_uwag" aria-describedby="status2">
                        <option value="Nowa">Nowe</option>
                        <option value="Oczekuje">Oczekujące</option>
                        <option value="Dodane">Dodane</option>
                        <option value="Usunięta">Usunięte</option>

                    </select>
                </div>
<div class="statusy" id="Nowa">

                @foreach($uwagi_nowe as $uwaga)
                    <div class=" lead"><span class="badge rounded-pill bg-danger">{{$uwaga->status}}</span>
                        <a href="{{ route('edycjaPropozycjeUwagi', $uwaga->id) }}" target="_blank" class="link-primary">
                            {{ Str::limit($uwaga->naglowek, 50) }}</a>
                    </div>
                    <div class="">{{ Str::limit($uwaga->tresc, 120) }}
                    </div>
                @endforeach

            </div>
                <div class="statusy visually-hidden" id="Oczekuje">

                    @foreach($uwagi_oczekujace as $uwaga)
                        <div class=" lead"><span class="badge rounded-pill bg-danger">{{$uwaga->status}}</span>
                            <a href="{{ route('edycjaPropozycjeUwagi', $uwaga->id) }}" target="_blank" class="link-primary">
                                {{ Str::limit($uwaga->naglowek, 50) }}</a>
                        </div>
                        <div class="">{{ Str::limit($uwaga->tresc, 120) }}
                        </div>
                    @endforeach
                </div>
                <div class="statusy visually-hidden" id="Dodane">


                    @foreach($uwagi_dodane as $uwaga)
                        <div class=" lead"><span class="badge rounded-pill bg-danger">{{$uwaga->status}}</span>
                            <a href="{{ route('edycjaPropozycjeUwagi', $uwaga->id) }}" target="_blank" class="link-primary">
                                {{ Str::limit($uwaga->naglowek, 50) }}</a>
                        </div>
                        <div class="">{{ Str::limit($uwaga->tresc, 120) }}
                        </div>
                    @endforeach

                </div>
                <div class="statusy visually-hidden" id="Usunięta">

                    @foreach($uwagi_usuniete as $uwaga)
                        <div class=" lead"><span class="badge rounded-pill bg-danger">{{$uwaga->status}}</span>
                            <a href="{{ route('edycjaPropozycjeUwagi', $uwaga->id) }}" target="_blank" class="link-primary">
                                {{ Str::limit($uwaga->naglowek, 50) }}</a>
                        </div>
                        <div class="">{{ Str::limit($uwaga->tresc, 120) }}
                        </div>
                    @endforeach
                </div>
            </div>

        </div>


    </form>



<button class="btn btn-danger mt-5 mb-5" type="button" data-bs-toggle="collapse" data-bs-target="#usuwanie" aria-expanded="false" aria-controls="usuwanie">
        Usuwanie
    </button>
    <div class="collapse " id="usuwanie">

        <div class="card card-body col-3 text-center mt-3">
            <form action="{{route('usunPropozycje', $propozycja->id)}}" method="post">
                @csrf
                {{method_field('DELETE')}}
                <button class="btn btn-danger" onclick="return confirm('Jesteś pewien?')">Usuń znalezione</button>


            </form>

        </div>
    </div>




@endsection