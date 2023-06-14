@section('more-css')
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,200" />
@endsection

@section('more-style')
  <style>
    .active-nav {
      background-color: #015581;
      color: white;
    }
  </style>
@endsection

<nav class="d-flex align-items-center py-2">
  <div class="ml-5 mr-2" style="flex: 1">
    <a href="{{ route('showByCategory') }}" style="text-decoration: none;">
      <img class="binus-logo mr-2" src="{{ asset('assets/logo/logo-binus.png') }}" alt="logo binus" width="100">
      <img class="bibliotheca-logo" src="{{ asset('assets/logo/bibliotheca-logo-cropped.png') }}" alt="logo bibliotheca" width="70">
    </a>
  </div>
  @if (Session::has('loginId'))
    <div class="ml-auto mr-2" style="flex: 2">
      <form class="form-inline" action="/search" method="post">
        @csrf
        <input class="form-control mr-sm-2" type="search" name="searchBooks" placeholder="Search" aria-label="Search" style="border-radius: 15px; background-color: #DFDFDF; width: 100%;">
      </form>
    </div>
    <div class="d-flex justify-content-end align-items-center ml-auto mr-5" style="flex: 1">
      <a class="mr-4" href="{{ route('notifications') }}">
        <span class="material-symbols-outlined rounded" style="font-size: 30px; 
        @if (@$routeName == 'notifications')
          background-color: #015581;
          color: white;
          padding: 5px;
        @endif">
          notifications
        </span>
      </a>
      <div class="nav-item dropdown">
        <a class="nav-link" id="navbarDropdown" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="material-symbols-outlined rounded" style="font-size: 30px; 
            @if (@$routeName == 'profile')
              background-color: #015581;
              color: white;
              padding: 5px;
            @endif
          ">
            account_circle
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
          <div class="dropdown-divider"></div>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="dropdown-item text-danger">Logout</button>
          </form>
        </div>
      </div>
    </div>
  @endif
</nav>
  