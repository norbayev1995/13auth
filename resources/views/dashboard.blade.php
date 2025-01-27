@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="text-center">Welcome to Your Dashboard</h2>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 profile-card">
                <h4 class="text-center">Your Profile</h4>
                <p>Name: <strong>{{ auth()->user()->name }}</strong></p>
                <p>Email: <strong>{{ auth()->user()->email }}</strong></p>
                <div class="text-center">
                    <img src="{{ asset('storage/images/' . auth()->user()->image) }}"
                         alt="Avatar"
                         class="img-fluid rounded-circle mb-3"
                         width="150">
                    <p><a href="{{ route('editPage') }}" class="btn btn-secondary">Edit Profile</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
