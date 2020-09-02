@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Página Principal</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        @section('content')
        {{-- <div class="flex-center position-ref full-height"> --}}
            <div class="content">
                <div class="title m-b-md">
                    ES_Social
                </div>
                <div class="container">
                    <div class="text-left col-3 shadow-sm" style="background-color: white">
                      <div class="row-md-1">Perfil</div>
                      <div class="row-md-3">Grupos</div>
                      <div class="row-md-3">Qué estás pensando?</div>
                    </div>
                  </div>
                  
                <div class="links">
                    {{-- @foreach ($users as $user)
                    <a href="#">{{ $user->name }}</a>
                    @endforeach --}}
                </div>
            </div>
        @endsection
    </body>
</html>

