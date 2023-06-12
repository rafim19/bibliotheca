@extends('layouts.app')

@section('more-style')
    <style>
        .categories {
            border: 2px solid #015581;
            width: 200px;
            text-align: center;
        }
        .is-active {
            background-color: #015581;
            font-weight: 500;
        }
    </style>
@endsection
@section('title', 'Bibliotheca')

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <div style="background-color: #068edb; color: white">
        <div class="d-flex justify-content-around py-5 mx-5">
            <a href="{{ route('showByCategory') }}" style="text-decoration: none; color: white;">
                <div 
                    class="d-flex justify-content-center align-items-center rounded categories 
                        @if (@$categoryId == null)
                            is-active
                        @endif
                    "
                >
                    <p class="m-0">Most Borrowed Books</p>
                </div>
            </a>
            <a href="{{ route('showByCategory', ['categoryId' => 1]) }}" style="text-decoration: none; color: white;">
                <div 
                    class="d-flex justify-content-center align-items-center rounded categories
                        @if (@$categoryId == 1)
                            is-active
                        @endif
                    "
                >
                    <p class="m-0">Mathematics</p>
                </div>
            </a>
            <a href="{{ route('showByCategory', ['categoryId' => 2]) }}" style="text-decoration: none; color: white;">
                <div 
                    class="d-flex justify-content-center align-items-center rounded categories
                        @if (@$categoryId == 2)
                            is-active
                        @endif
                    "
                >
                    <p class="m-0">Programming</p>
                </div>
            </a>
            <a href="{{ route('showByCategory', ['categoryId' => 3]) }}" style="text-decoration: none; color: white;">
                <div 
                    class="d-flex justify-content-center align-items-center rounded categories
                        @if (@$categoryId == 3)
                            is-active
                        @endif
                    "
                >
                    <p class="m-0">Statistics</p>
                </div>
            </a>
            <a href="{{ route('showByCategory', ['categoryId' => 4]) }}" style="text-decoration: none; color: white;">
                <div 
                    class="d-flex justify-content-center align-items-center rounded categories
                        @if (@$categoryId == 4)
                            is-active
                        @endif
                    "
                >
                    <p class="m-0">Other</p>
                </div>
            </a>
        </div>
    </div>
    <div class="d-flex flex-wrap m-5">
        @foreach ($books as $book)
            <div class="d-flex flex-column border mx-4 mb-4" style="width: 180px; height: 380px; border-radius: 20px; background-color: #D9D9D9; cursor: pointer">
                <div>
                    <img src="{{ asset('assets/books/'.$book->id.'.jpg') }}" alt="{{ $book->title }}" style="width: 100%; height: 250px; border-radius: 15px; object-fit: fill">
                </div>
                <div class="d-flex flex-column px-3 pt-2 pb-3" style="height: 100%">
                    <h6 class="">{{ $book->title }}</h6>
                    <div class="d-flex text-right align-self-end" style="height: 100%">
                        <button class="btn align-self-end" data-toggle="modal" data-target="{{ '#detail-book-'.$book->id }}" style="background-color: #F8B133; color: white; border-radius: 10px">
                            Details
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="{{ 'detail-book-'.$book->id }}" tabindex="-1" role="dialog" aria-labelledby="{{ 'detail-book-title-'.$book->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header" style="background-color: #0097DA; color: white;">
                      <h5 class="modal-title" id="{{ 'detail-book-title-'.$book->id }}">{{ $book->title }}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="d-flex modal-body">
                      <div style="flex: 1">
                        <div>
                            <img src="{{ asset('assets/books/'.$book->id.'.jpg') }}" alt="{{ $book->title }}" style="width: 100%; border-radius: 15px; object-fit: fill">
                        </div>
                      </div>
                      <div style="flex: 1">
                        <div>
                            <h4>{{ $book->title }}</h4>
                            <p>{{ $book->author }}</p>
                        </div>
                        <hr>
                        <p>{{ $book->description }}</p>
                      </div>
                    </div>
                    {{-- <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                  </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Button trigger modal -->
{{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detail-book">
    Launch demo modal
  </button>
   --}}
  <!-- Modal -->
@endsection
