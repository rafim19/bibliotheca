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
    <div class="d-flex justify-content-around container">
        <div class="my-5">
            <h1>Welcome to Bibliotheca</h1>
            <h4 class="ml-4">Fulfill your curiosity with Bibliotheca!</h4>
            {{-- TODO: isi actionnya --}}
            <form action="/login" method="POST" class="mt-5">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" 
                        class="form-control 
                            @error('email')
                                is-invalid
                            @enderror
                        "
                        id="email" name="email" 
                        aria-describedby="emailHelp" 
                        placeholder="Your Binusian Email" 
                        style="border-radius: 10px;"
                        value="{{ old('email') }}"
                        required
                    >
                    @error('email')
                        <small style="color: #D73930">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" style="border-radius: 10px;" required>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button type="submit" class="btn px-5" style="background-color: #f8b133; color: white; border-radius: 40px">Sign In</button>
                </div>
            </form>
        </div>
        <div class="d-flex align-items-center">
            <img src="{{ asset('assets/hero.png') }}" alt="books">
        </div>
    </div>
@endsection

{{-- @section('more-components')
    @include('components.footer')
@endsection --}}