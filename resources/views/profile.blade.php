@extends('layouts.app')

@section('more-style')
    <style>
      .profile-body {
        display: grid;
        grid-template-columns: 1fr 2fr;
      }
      .active-tab {
        background-color: #068edb;
        /* font-weight: bold; */
      }
      .non-active-tab {
        background-color: #55c2ff;
      }
      .detail-wrapper {
        display: grid;
        grid-template-columns: 0.7fr 0.1fr 2fr;
        grid-template-rows: auto auto 1fr;
      }
    </style>
@endsection
@section('title', 'Profile')

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <div class="mb-4" style="background-color: #068edb; color: white">
      <h2 class="container py-4">Profile Page</h2>
    </div>
    <div id="error"></div>
    <div class="profile-body container mb-5">
      <div class="">
        <div class="mb-4 text-center">
          <img src="{{ asset('assets/user/'.$user->nim.'.png') }}" alt="{{ $user->name.' photo' }}" style="border-radius: 100%; width: 50%">
        </div>
        <div class="container">
          <h4 class="mb-4 text-center">{{ $user->name }}</h4>
          <div class="row">
            <p class="col font-weight-bold">NIM</p>
            <p class="col-8">{{ $user->nim }}</p>
          </div>
          <div class="row">
            <p class="col font-weight-bold">Email</p>
            <p class="col-8">{{ $user->email }}</p>
          </div>
          <div class="row">
            <p class="col font-weight-bold">Gender</p>
            <p class="col-8">{{ $user->gender }}</p>
          </div>
          <div class="row">
            <p class="col font-weight-bold">Domicile</p>
            <p class="col-8">{{ $user->domicile }}</p>
          </div>
          <div class="row">
            <p class="col font-weight-bold">Phone</p>
            <p class="col-8">{{ $user->phone_number }}</p>
          </div>
          <div class="row">
            <p class="col font-weight-bold">Faculty</p>
            <p class="col-8">{{ $user->faculty }}</p>
          </div>
          <div class="row">
            <p class="col font-weight-bold">Major</p>
            <p class="col-8">{{ $user->major }}</p>
          </div>
        </div>
      </div>
      <div class="">
        <h3 class="mb-3">Your Books</h3>
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <div class="w-50 rounded-top active-tab" id="nav-in-progress-wrapper">
              <a class="nav-link text-white font-weight-bold" id="nav-in-progress-tab" href="#nav-in-progress">
                In Progress
              </a>
            </div>
            <div class="w-50 rounded-top non-active-tab" id="nav-finished-wrapper">
              <a class="nav-link text-dark" id="nav-finished-tab" href="#nav-finished">
                Finished
              </a>
            </div>
          </div>
        </nav>
        <div class="tab-content p-4" id="nav-tabContent" style="background-color: #e1e1e1">
          <div class="tab-pane show active" id="nav-in-progress" role="tabpanel">
            @foreach ($inProgressBooks as $inProgress)
              <div class="row mb-4">
                <div class="col">
                  <img class="rounded" src="{{ asset('assets/books/'.$inProgress->book->id.'.jpg') }}" alt="{{ $inProgress->book->title }}" style="width: 100%;">
                </div>
                <div class="col-9">
                  <div class="detail-wrapper">
                    <p class="mb-2 font-weight-bold" style="align-self:center">Name Book</p>
                    <p class="mb-2 font-weight-bold" style="align-self:center">:</p>
                    <p class="mb-2" style="align-self:center">{{ $inProgress->book->title }}</p>
                  </div>
                  <div class="detail-wrapper">
                    <p class="mb-2 font-weight-bold" style="align-self:center">Borrowed Date</p>
                    <p class="mb-2 font-weight-bold" style="align-self:center">:</p>
                    <p class="mb-2" style="align-self:center">{{ date('d M Y', strtotime($inProgress->borrowed_date)) }}</p>
                  </div>
                  <div class="detail-wrapper">
                    <p class="mb-2 font-weight-bold" style="align-self:center">Due Date</p>
                    <p class="mb-2 font-weight-bold" style="align-self:center">:</p>
                    <p class="mb-2" style="align-self:center">{{ date('d M Y', strtotime($inProgress->due_date)) }}</p>
                  </div>
                  <a class="btn mt-3" href="{{ asset('assets/books/'.$inProgress->book->id.'.pdf') }}" target="_blank" style="background-color: #F8B133; color: white; border-radius: 10px">Read Book</a>
                </div>
              </div>
            @endforeach
            {{ $inProgressBooks->links() }}
          </div>
          <div class="tab-pane" id="nav-finished" role="tabpanel">
            @foreach ($finishedBooks as $finished)
              <div class="row mb-4">
                <div class="col">
                  <img class="rounded" src="{{ asset('assets/books/'.$finished->book->id.'.jpg') }}" alt="{{ $finished->book->title }}" style="width: 100%;">
                </div>
                <div class="col-9">
                  <div class="detail-wrapper">
                    <p class="mb-2 font-weight-bold" style="align-self:center">Name Book</p>
                    <p class="mb-2 font-weight-bold" style="align-self:center">:</p>
                    <p class="mb-2" style="align-self:center">{{ $finished->book->title }}</p>
                  </div>
                  <div class="detail-wrapper">
                    <p class="mb-2 font-weight-bold" style="align-self:center">Borrowed Date</p>
                    <p class="mb-2 font-weight-bold" style="align-self:center">:</p>
                    <p class="mb-2" style="align-self:center">{{ date('d M Y', strtotime($finished->borrowed_date)) }}</p>
                  </div>
                  <div class="detail-wrapper">
                    <p class="mb-2 font-weight-bold" style="align-self:center">Due Date</p>
                    <p class="mb-2 font-weight-bold" style="align-self:center">:</p>
                    <p class="mb-2" style="align-self:center">{{ date('d M Y', strtotime($finished->due_date)) }}</p>
                  </div>
                </div>
              </div>
            @endforeach
            {{ $finishedBooks->links() }}
          </div>
        </div>
      </div>
    </div>
@endsection

@section('more-js')
  <script>
    let inProgressTabWrapper = document.getElementById('nav-in-progress-wrapper');
    let inProgressTab = document.getElementById('nav-in-progress-tab');
    let inProgressBody = document.getElementById('nav-in-progress');

    let finishedTabWrapper = document.getElementById('nav-finished-wrapper');
    let finishedTab = document.getElementById('nav-finished-tab');
    let finishedBody = document.getElementById('nav-finished');

    inProgressTab.addEventListener('click', function(e) {
      // console.log(inProgressTab.classList.contains('active'));
      if (inProgressTab.classList.contains('active')) {
        return;
      }

      // inProgressTab.classList.add('active');
      inProgressTabWrapper.classList.remove('non-active-tab');
      inProgressTabWrapper.classList.add('active-tab');
      inProgressTab.classList.remove('text-dark');
      inProgressTab.classList.add('text-white');
      inProgressTab.classList.add('font-weight-bold');
      // finishedTab.classList.remove('active');
      if (finishedTabWrapper.classList.contains('active-tab')) {
        finishedTab.classList.remove('font-weight-bold');
        finishedTabWrapper.classList.remove('active-tab');
        finishedTabWrapper.classList.add('non-active-tab');
        finishedTab.classList.remove('text-white');
        finishedTab.classList.add('text-dark');
      }

      if (inProgressBody.classList.contains('active') && inProgressBody.classList.contains('show')) {
        return;
      }

      inProgressBody.classList.add('active');
      inProgressBody.classList.add('show');
      finishedBody.classList.remove('active');
      finishedBody.classList.remove('show');
    });

    finishedTab.addEventListener('click', function(e) {
      // console.log(finishedTab.classList.contains('active'));
      if (finishedTab.classList.contains('active')) {
        return;
      }

      // finishedTab.classList.add('active');
      finishedTabWrapper.classList.remove('non-active-tab');
      finishedTabWrapper.classList.add('active-tab');
      finishedTab.classList.remove('text-dark');
      finishedTab.classList.add('text-white');
      finishedTab.classList.add('font-weight-bold');
      // inProgressTab.classList.remove('active');
      if (inProgressTabWrapper.classList.contains('active-tab')) {
        inProgressTab.classList.remove('font-weight-bold');
        inProgressTabWrapper.classList.remove('active-tab');
        inProgressTabWrapper.classList.add('non-active-tab');
        inProgressTab.classList.remove('text-white');
        inProgressTab.classList.add('text-dark');
      }

      if (finishedBody.classList.contains('active') && finishedBody.classList.contains('show')) {
        return;
      }

      finishedBody.classList.add('active');
      finishedBody.classList.add('show');
      inProgressBody.classList.remove('active');
      inProgressBody.classList.remove('show');
    });
  </script>
@endsection
