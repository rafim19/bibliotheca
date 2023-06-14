@extends('layouts.app')

@section('more-style')
    <style>
        /* hr {
            border: 0;
            clear:both;
            display:block;
            width: 100%;
            background-color:#FFFF00;
            height: 1px;
        } */
        .categories {
            border: 1.5px solid #015581;
            width: 200px;
            text-align: center;
        }
        .is-active {
            background-color: #015581;
            font-weight: 500;
        }
        /* .modal-footer {
            display: grid;
            grid-template-columns: 1fr 1fr;
        } */
    </style>
@endsection
@section('title', 'Bibliotheca')

@section('header')
    @include('components.navbar')
@endsection

@section('main')
    <div class="mb-4" style="background-color: #068edb; color: white">
        <h2 class="container py-4">Result</h2>
    </div>
    <div class="d-flex flex-wrap m-5">
        @if ($isEmpty)
            <h4 class="container">No Book Found.</h4>
        @else
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
                            <div class="row modal-body">
                                <div class="col" style="">
                                    <img src="{{ asset('assets/books/'.$book->id.'.jpg') }}" alt="{{ $book->title }}" style="width: 100%; border-radius: 15px; object-fit: fill">
                                </div>
                                <div class="col-7" style="height: 100%">
                                    <div>
                                        <h4>{{ $book->title }}</h4>
                                        <p>{{ $book->author }}</p>
                                    </div>
                                    <hr>
                                    <p>{!! $book->description !!}</p>
                                    {{-- <hr> --}}
                                </div>
                            </div>
                            {{-- <hr> --}}
                            <div class="modal-footer">
                                <div class="col mb-auto">
                                    {{-- <form action="/borrow" method="POST"> --}}
                                        {{-- <input type="hidden" name="bookId" value="{{ $book->id }}"> --}}
                                    <button id="{{ 'borrow-btn-'.$book->id }}" class="btn btn-block" style="background-color: #F8B133; color: white; border-radius: 10px;">Borrow</button>
                                    <div class="text-center"><small class=""><b>Length of borrowing: 7 Days</b></small></div>
                                    {{-- </form> --}}
                                </div>
                                <div class="col-7">
                                    <h5>Detail</h5>
                                    <div class="d-flex">
                                        <div class="mr-5">
                                            <small class="d-block text-muted">ISBN: <b>{{ $book->isbn }}</b></small>
                                            <small class="d-block text-muted">Publisher: <b>{{ $book->publisher }}</b></small>
                                            <small class="d-block text-muted">Year: <b>{{ $book->release_year }}</b></small>
                                        </div>
                                        <div>
                                            <small class="d-block text-muted">Edition: <b>{{ $book->edition }}</b></small>
                                            <small class="d-block text-muted">Language: <b>{{ $book->language }}</b></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('more-js')
    <script>
        let books = {!! json_encode($books, JSON_HEX_TAG) !!};

        books.forEach((book, idx) => {
            window['borrowBtn' + book.id] = document.getElementById('borrow-btn-' + book.id);
            window['borrowBtn' + book.id].addEventListener('click', async function(e) {
                let response = await fetch('/borrow/' + book.id);
                let body = await response.json();

                alert(body.title)
	            window.location.href = 'http://127.0.0.1:8000/profile';
                // if (body?.code == 200) {
                //     alert('Berhasil');
                // } else {
                //     alert(body.title)
                // }
            })
        });
    </script>
@endsection