@if(count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger">
      @lang($error)
    </div>
  @endforeach
@endif

@if(session('success'))
  <div class="alert alert-success">
    @lang(Session::get('success'))
  </div>
@endif

@if(session('error'))
  <div class="alert alert-danger">
    {!!__(Session::get('error'))!!}

  </div>
@endif

@yield('content')