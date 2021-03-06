@extends('layouts/template')

@section('container')
<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-6">
            <img src="{{ asset('img/jumbImg2 (Small).jpg') }}" alt="">
        </div>
        <div class="col-6">
            <form action="/register" method="POST"> 
                @csrf
                <h5 class="display-5"><a href="/" style="text-decoration: none;">InternSearch</a> Register</h5>
                <div class="mb-3">
                    <label for="emailLabel" class="form-label ">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailLabel" name="email" value="{{ old('email')}}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="namaLabel" class="form-label ">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="namaLabel" name="name" value="{{ old('name')}}">
                    @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passLabel" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="passLabel" name="password">
                    @error('password')
                    <div class=" invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <div class="form-text mb-3">Already have an account? <a href="/login" style="text-decoration: none;">login here!</a></div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-pen"></i> Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection