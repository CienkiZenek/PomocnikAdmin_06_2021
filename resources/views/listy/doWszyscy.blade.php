@component('mail::message')
List do wszyscy!<br>
# {{$user->name}}<br>
{{$tresc}}

    {{--@component('mail::button', ['url' => url('/')])

    @endcomponent--}}

Pozdrawiamy<br>
{{ config('app.name') }}

@endcomponent
