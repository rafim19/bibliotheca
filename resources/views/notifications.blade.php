@extends('layouts.app')

@section('more-style')
    <style>

    </style>
@endsection
@section('title', 'Notifications')

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <div class="mb-4" style="background-color: #068edb; color: white">
      <h2 class="container py-4">Notifications</h2>
    </div>
    <div id="error"></div>
    <div class="container">
      @if ($isEmpty)
        <p class="mt-5">No Notifications</p>
      @else
        @foreach ($notifications as $notification)
          <div 
            id="{{ 'notification-wrapper-'.$notification->id }}" 
            style="@if ($notification->is_read == 1) opacity: 0.5 @endif"
          >
            <div class="card p-3 mb-4" style="background-color: #ebebeb;">
              <h5>{{ $notification->title }}</h5>
              <p class="m-0">{!! $notification->description !!}</p>
            </div>
          </div>
        @endforeach
      @endif
    </div>
@endsection

@section('more-js')
  <script>
    let isEmpty = {!! Js::from($isEmpty) !!};
    let notifications = {!! json_encode($notifications, JSON_HEX_TAG) !!};

    if (!isEmpty) {
      notifications.forEach((notification, idx) => {
        window['notifCard' + notification.id] = document.getElementById('notification-wrapper-' + notification.id);
  
        let isRead = notification.is_read;
        
        if (isRead) {
          return;
        }

        window['notifCard' + notification.id].addEventListener('click', async function(e) {
          let response = await fetch('api/read-notif/' + notification.id);
          // let response = await fetch('api/read-notif/0');
          let result = await response.json();
  
          if (result?.code != 200) {
            let errorWrapper = document.getElementById('error');

            errorWrapper.innerHTML = `<div id="failed-notif" class="container alert alert-danger" role="alert">${result?.title}</div>`;
            setTimeout(() => {
              $("#failed-notif").alert('close');
            }, 4000);
            return;
          }
          window['notifCard' + notification.id].style.opacity = 0.5;
        });
      });
    }
  </script>
@endsection
