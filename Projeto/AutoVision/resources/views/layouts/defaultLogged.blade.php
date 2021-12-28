<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
    <body>
        <div class="container-fluid text-light p-3" style="background-color: rgb(35, 36, 38)">
            <div class="row" style="align-items: end;">
                <div class="col-sm" style="padding-left: 2rem; padding-right: 2rem; padding-top: 2rem;">
                    <div style="justify-content: space-between; align-items: end" class="col-sm d-flex">
                        <h1>AutoVision</h1>
                        <h4>Bem vindo!</h4>
                    </div>
                    <div style="justify-content: space-between" class="col-sm d-flex">
                        <p>Controle de Revisão de Veículos</p>
                        @if(Auth::check())
                            <h6>{{ Auth::user()->name }}</h6>
                        @endif
                    </div>
                </div>
                <hr>
                <nav class="navbar navbar-expand-lg">
                    <a class="nav-link" style="margin-right: 2rem; color: #fff;" href="{{ route('home') }}" type="button">Home</a>
                    <a class="nav-link" style="margin-right: 2rem; color: #fff;" href="{{ route('car.index') }}" type="button">Meus carros</a>
                    <div class="col-sm d-flex justify-content-end">
                        <a type="button" style="width: 8rem; margin-right: 1rem; color: #fff;" class="nav-link" href="{{ route('user.show') }}">Minha Conta</a>
                        <a type="button" style="width: 8rem" class="btn btn-secondary" href="{{ route('logout') }}">Sair</a>
                    </div>
                </nav>
            </div>
        </div>
            
        @yield('content')
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>
    </body>
</html>