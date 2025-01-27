@extends('layouts.app')
@section('title', 'Register')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Register</h2>
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="registerName">Name</label>
                    <input type="text" name="name" class="form-control" id="registerName" required>
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email address</label>
                    <input type="email" name="email" class="form-control" id="registerEmail" required>
                    @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="registerPassword" required>
                    @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="registerAvatar">Upload Avatar</label>
                    <input type="file" name="image" class="form-control-file" id="registerAvatar">
                    @error('image')<span class="text-danger">{{ $messge }}</span>@enderror
                </div>
                <button type="submit" class="btn btn-success btn-block">Register</button>
            </form>
            <p class="text-center mt-2">Already have an account? <a href="{{ route('loginPage') }}">Login</a></p>
        </div>
    </div>
</div>
@endsection
