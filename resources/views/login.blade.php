@if (Auth::check())
    <meta http-equiv="refresh" content="0;URL=welcome">
@else
    {{--  --}}
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
    <script>
        window.onload = function(){
            var contenedor = document.getElementById('contenedor_carga');
            contenedor.style.visibility = 'hidden';
            contenedor.style.opacity = '0';
        }
    </script>
    <div id="contenedor_carga">
    <div id="carga">
    </div>
    </div>
    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-4 login-sec">
                    <h2 class="text-center">ES-Social</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email" class="text-uppercase">{{ __('Correo Electrónico') }}</label>
            <div class="col">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
        </div>
        <div class="form-group">
            <label for="password" class="text-uppercase">{{ __('Contraseña') }}</label>
            <div class="col">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        
        
            <div class="form-check">
            <label class="form-check-label">
            <input type="checkbox" class="form-check-input">
            <small>Recordar Sesión</small>
            </label>
            <!-- Indica una acción exitosa o positiva -->
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                </li>
            @endif
            <button type="submit" class="btn btn-success float-right">Iniciar Sesión</button>
        </div>
        
        </form>
            </div>
                <div class="col-md-8 banner-sec">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                    <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active">
                            <img class="d-block img-fluid" src="images/3.png" alt="First slide">

                            </div>
                            <div class="carousel-item">
                            <img class="d-block img-fluid" src="images/4.png" alt="First slide">
                            </div>
                            <div class="carousel-item">
                            <img class="d-block img-fluid" src="images/5.png" alt="First slide">
                            </div>
                    </div>
                    </div>	   
                    
                </div>
            </div>
        </div>
    </section>
</body>
</html>





