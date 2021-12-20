<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

</head>
    <body>

        <div class="container-fluid bg-dark text-light p-4">
            <div class="container bg-dark p-4">
                <h1 onclick="location.href='{{ url('/home') }}'">Sistema de Controle de Protocolos</h1>
                <p>Sistemas Web I - Universidade Federal de Ouro Preto</p>
                <hr>
                <a type="button" style="width: 8rem" class="btn btn-primary" href="{{ route('login') }}">Entrar</a>
                <a type="button" style="width: 8rem" class="btn btn-secondary" href="{{ route('register') }}">Cadastrar</a>
            </div>
        </div>
        
        <div class="container">
            @yield('content')
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
        crossorigin="anonymous"></script>
    </body>
</html>