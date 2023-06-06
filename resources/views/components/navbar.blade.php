@section('more-css')
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endsection

<nav class="d-flex align-items-center py-2">
  <div class="ml-5 mr-2" style="flex: 1">
    <img class="binus-logo mr-2" src="{{ asset('assets/logo/logo-binus.png') }}" alt="logo binus" width="100">
    <img class="bibliotheca-logo" src="{{ asset('assets/logo/bibliotheca-logo-cropped.png') }}" alt="logo bibliotheca" width="70">
  </div>
  @auth
    <div class="ml-auto mr-2" style="flex: 2">
      <form class="form-inline" action="" method="">
        <input class="form-control mr-sm-2" type="search" name="searchBooks" placeholder="Search" aria-label="Search" style="border-radius: 15px; background-color: #DFDFDF; width: 100%;">
      </form>
    </div>
    <div class="d-flex justify-content-around align-items-center ml-auto mr-5" style="flex: 1">
      <p class="m-0">Notification</p>
      <p class="m-0">Profile</p>
    </div>
  @endauth
</nav>
  