<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Netmex Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
        <div class="container-fluid">
            <div class="menu">
                <div class="row">
                    <div class="col-sm-2" style="padding:0px">
                        <div class="icono">
                            LOGO
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cont_btns">
                            <button type="button" class="btn btn-primary" id="btn_paypal"><a href="" alt="">donacion por paypal</a></button>
                            <button type="button" class="btn" id="btn_login"><a href="">iniciar sesion</a></button>
                        </div>
                    </div>
                </div>
            </div>

            @yield('nosotros')
            @yield('mision')
            @yield('vision')
            @yield('valores')
            @yield('tyc')
            <nav aria-label="...">
                <ul class="pagination pagination-lg">
                    <li class="page-item">
                        <a class="page-link bg-transparent text-white border-0" href="{{ route('nosotros') }}">Nosotros</a>
                    </li>
                    <li class="page-item" aria-current="page">
                        <a class="page-link bg-transparent text-white border-0" href="{{ route('mision') }}">Misión</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-transparent text-white border-0" href="{{ route('vision') }}">Visión</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-transparent text-white border-0" href="{{ route('valores') }}">Valores</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link bg-transparent text-white border-0 --bs-link-hover-color: #038c5a;" href="{{ route('tyc') }}">TyC</a>
                    </li>
                </ul>
            </nav>
        </div>
        <footer class="main_footer">
                @yield('pie')
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        
                    </li>
                </ul>
        </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </body>
</html>