<html>
<head>

</head>
<body>
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    @yield('content')
</body>
</html>
