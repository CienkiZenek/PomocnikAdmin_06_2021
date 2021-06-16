@component('mail::message')
List do ISZK!<br>
# {{$user->name}}
{{$tresc}}<br>

    {{--@component('mail::button', ['url' => url('/')])

    @endcomponent--}}

Pozdrawiamy<br>
{{ config('app.name') }}

@endcomponent