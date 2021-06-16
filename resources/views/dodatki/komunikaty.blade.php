@if(session('komunikat'))
    <div class="alert alert-primary">
        {{ session('komunikat') }}
    </div>
@endif

