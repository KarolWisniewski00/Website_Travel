@extends('layouts.main')

<!--PASEK NAWIGACYJNY-->
@section('login')
@if(Session::has('login_id'))
<div class="col-md-3 text-end">
    <div class="my-2">Witaj, {{$user->name}} {{$user->surname}}</div>
    <a href="account" class="btn btn-outline-primary me-2">Konto</a>
    <a href="logout" class="btn btn-primary">Wyloguj</a>
</div>
@endif
@endsection

@section('content')
<div class="container">
    <!--ALBUM-->
    <h1 class="my-5">Wszystkie Wycieczki</h1>
    <!--ALERTY-->
    @if(Session::has('success'))
    <div class="alert alert-success">{{Session::get('success')}}</div>
    @endif

    @if(Session::has('fail'))
    <div class="alert alert-danger">{{Session::get('fail')}}</div>
    @endif
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <!--DODAJ NOWE-->
        <div class="col">
            <div class="card shadow-sm h-100 d-flex flex-column justify-content-center align-items-center">
                <div><a href="create" class="btn btn-primary m-4" style="font-size:4rem;">+</a></div>
            </div>
        </div>
        @foreach ($trips as $trip)
        <!--POJEDYŃCZA KARTA-->
        <div class="col">
            <div class="card shadow-sm h-100">
                <img src="{{ asset('assets/'.$trip->path_photo_1) }}" class="d-block mx-lg-auto img-fluid" alt="Trip_main_photo" width="700" height="500" loading="lazy">

                <div class="card-body d-flex flex-column justify-content-center">
                    <h2 class="fw-bold">{{$trip->hotel_name}}</h2>
                    <h4 class="text-muted">{{$trip->country}}</h4>
                    <p class="card-text">{{$trip->food}}</p>
                    <p class="card-text">{{$trip->transport}}</p>
                    <h2 class="text-primary">{{$trip->price}} PLN</h2>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="trip-{{$trip->id}}" class="btn btn-sm btn-outline-primary">Szczegóły</a>
                            <a href="edit-trip-{{$trip->id}}" class="btn btn-sm btn-primary">Edytuj</a>
                            <a href="delete-trip-{{$trip->id}}" class="btn btn-sm btn-danger">Usuń</a>
                        </div>
                    </div>
                    <div class="text-muted my-2">{{$trip->date_start}} - {{$trip->date_end}}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection