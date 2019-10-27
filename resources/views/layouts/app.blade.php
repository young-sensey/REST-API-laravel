<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')</title>
    <!-- CSS и JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

@include('layouts.nav')

@yield('content')

@include('layouts.footer')

</body>
</html>
