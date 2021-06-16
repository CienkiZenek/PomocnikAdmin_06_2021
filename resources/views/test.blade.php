@extends('szablon')
@section('title', 'Test')
@section('tresc')

@livewire('przypisy-modul', ['przypisy' => $przypisy, 'id_zagadnienia'=>$zagadnienie->id])

@endsection