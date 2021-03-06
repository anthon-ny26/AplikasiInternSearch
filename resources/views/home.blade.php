<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/myStyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>InternSearch</title>
</head>

<body>
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="container-fluid">
        <nav class="navbar sticky-top navbar-expand-lg bg-transparent navbar-light d-flex">
            <div class="container-fluid">
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNavAltMarkup">
                    <ul class="navbar-nav" id="itemNav">
                        @auth
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn"><a style="text-decoration: none;">Logout</a></button>
                            </form>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link btn" href="/register">Register</a>
                        </li>
                        <div class="vr"></div>
                        <li class="nav-item">
                            <a class="nav-link btn" href="/login">Login</a>
                        </li>
                        @endauth

                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="p-5 mb-4 bg-light" id="jumbotron">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold ">InternSearch</h1>
            <p class="col-md-8 fs-4 ">Achieve your future with InternSearch</p>
            <div class="row">
                <div class="col-5" id="searchBox">
                    <form action="/">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Find your dream company!" name="search" value="{{ request('search') }}">
                            <button class="btn btn-light bi bi-search" type="submit"></button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="container mt-3" id="cardCont">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <h2>Company List</h2>
            </div>
        </div>

        @if($dbcompany->count())
        <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
            @foreach($dbcompany as $cf)
            <div class="col">
                <div class="card h-20">
                    <img class="card-img-top" src="{{ asset('/img/DSC_0331 (Small).jpg') }}" alt="" style="height: 500px;">
                    <div class="card-body">
                        <h5 class="card-title">{{$cf["name"]}}</h5>
                        <a class="btn btn-success" href="/company/{{$cf['id']}}" role="button">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination mt-3 justify-content-center">
            {{ $dbcompany->links() }}
        </div>
        @else
        <p class="text-center fs-4">Seems like your dream company doesnt open any interns :(</p>
        @endif
    </div>

    <div class="container-fluid bg-secondary" id="footer">
        <div class="col justify-content-center d-flex">
            <p class="small text-white my-auto">All copy rights reserve to InternSearch</p>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>