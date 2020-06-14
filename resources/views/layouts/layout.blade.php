<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>{{$title}}</title>
</head>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<link rel="stylesheet" href="{{asset('css/style.css')}}">

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="col-6 navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная<span class="sr-only">(current)</span></a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                {{$error}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
        @endforeach
    @endif

    @yield('content')


</div>
<script src="{{asset('js/app.js')}}"></script>
<script src ="{{asset('js/search.js')}}"></script>
</body>
</html>
