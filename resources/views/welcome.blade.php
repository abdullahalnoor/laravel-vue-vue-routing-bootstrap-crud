<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Laravel</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>

<body>
    <div id="app">

        <nav class="nav justify-content-center|justify-content-end">
            <a class="nav-link active" href="#">Active link</a>
            <a class="nav-link" href="#">
                Sample
            </a>
            <router-link class="nav-link" to="/example">Example</router-link>
        </nav>


        <div class="container flex-center position-ref full-height">

            <router-view></router-view>
            <!-- Button trigger modal -->


        </div>

    </div>


    <script src="{{asset('js/app.js')}}"></script>

</body>

</html>