@extends('layouts/template')

@section('container')
<div class="container">

    <div id="carouselExampleControls" class="carousel slide mt-3 carousel-dark" style="background: #FBF8F1;" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                    <img src="{{ asset('/img/DSC_0331 (Small).jpg') }}" class="d-block mx-auto "style="min-height: 200px;max-height:400px"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/img/foto1 (Small).jpg') }}" class="d-block mx-auto "style="min-height: 200px;max-height:400px"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/img/foto2 (Small).jpg') }}" class="d-block mx-auto"style="min-height: 200px;max-height:400px"  alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('/img/foto3 (Small).jpg') }}" class="d-block mx-auto"style="min-height: 200px;max-height:400px"  alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    
    <div class="col">
        <h2>{{$company['name']}}</h2>
        <div class="row">
            <div class="col-md-6">
                <i class="bi bi-star-fill"></i>
                {{$rating}}
                <h4 class="mt-0">Rating</h4>
            </div>
            <div class="col-md-6">
                <i class="bi bi-hand-thumbs-up-fill"></i>
                {{$like}}
                <h4>Likes</h4>
            </div>
        </div>
        <h3>Address</h3>
        <p>{{$company['address']}}</p>
        <h3>Description</h3>
        <p>{{$company['description']}}</p>
        <h3>Review</h3>
        @foreach($company->review as $review)
        <div class="card mt-1">
            <div class="card-body">
                <h5 class="card-title">{{$review->user['name']}}</h5>
                <p class="card-text">{{$review['comment']}}</p>
            </div>
        </div>
        @endforeach
        <form action="/company/{$company['id']}" method="POST" class="mt-2">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="mb-3">
                        <input type="hidden" id="userId" name="user_id" value="{{auth()->user()->id}}">
                        <input type="hidden" id="companyId" name="company_id" value="{{$company['id']}}">
                        <input type="text" class="form-control @error('comment') is-invalid @enderror" id="commentLabel"
                            name="comment" value="{{ old('comment')}}" placeholder="Add Comment...">
                        @error('comment')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    {{-- likes and rating button --}}
                </div>
                <div class="col-5">
                    <div class="row">
                        <div class="col-4">
                            {{-- https://laracasts.com/discuss/channels/general-discussion/how-i-can-get-selected-value-option --}}
                            {{-- Coba check link diatas buat ambil value di select input --}}
                            <select class="form-select" name="rating">
                                <option value="1">One Star</option>
                                <option value="2">Two Stars</option>
                                <option value="3">Three Stars</option>
                                <option value="4">Four Stars</option>
                                <option value="5">Five Stars</option>
                            </select>
                        </div>
                        <div class="col-2 d-flex justify-content-center align-items-center">
                                <input type="checkbox" id="likeBox" name="like" class="form-check-input">
                                <label for="likeBox" class="form-check-label bi bi-hand-thumbs-up-fill"></label>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-success bi bi-pencil fs-8"> Comment & Rating</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="d-flex justify-content-start mb-3">
            <button type="button" class="btn btn-success"><a href="/"
                    style="text-decoration: none; color:whitesmoke;"><i class="bi bi-arrow-left"></i> Back to
                    home</a></button>
        </div>
    </div>
</div>
@endsection
