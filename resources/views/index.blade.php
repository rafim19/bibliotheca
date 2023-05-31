@extends('layouts.app')

@section('more-style')
    <style>
        main {
            background-color: #068edb;
            color: white;
        }
    </style>
@endsection
@section('title', 'Login')

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <div class="my-5 container">
        <h1>Welcome to Bibliotheca</h1>
        <h4 class="ml-4">Fulfill your curiosity with Bibliotheca!</h4>
        <form method="POST">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Your Binusian Email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" id="inputPassword" placeholder="Your Password">
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
    </div>
    <div>
        <img src="" alt="">
    </div>
@endsection

{{-- @section('more-components')
    @include('components.footer')
@endsection --}}