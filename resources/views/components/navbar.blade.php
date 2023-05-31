@section('more-css')
  <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
@endsection
<nav class="d-flex align-items-center p-2">
{{-- Check apakah sudah login atau belum --}}
{{-- @if () --}}
    
{{-- @else --}}
{{-- @endif --}}
  <div class="ml-5">
    <img class="binus-logo mr-2" src="{{ asset('assets/logo/logo-binus.png') }}" alt="logo binus" width="100">
    <img class="bibliotheca-logo" src="{{ asset('assets/logo/bibliotheca-logo-cropped.png') }}" alt="logo bibliotheca" width="70">
  </div>
</nav>
  