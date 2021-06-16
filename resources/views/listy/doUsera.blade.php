@component('mail::message')

    List do usera<br>
    # {{$user->name}}<br>
    {{$tresc}}<br><br><br>


    {{--@component('mail::button', ['url' => url('/')])

    @endcomponent--}}

    Pozdrawiamy<br>
    {{ config('app.name') }}


@endcomponent
