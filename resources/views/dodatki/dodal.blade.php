<div class="row">

      @if(isset($user))
      <div class="col-6  alert alert-dark">Dodano przez: <a href="{{route('edycjaUzytkownika', $user)}}">{{$user->name}}</a></div>
@endif

</div>