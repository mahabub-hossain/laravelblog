<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>

    @include('user.layouts.head')

</head>

<body>

<!-- Navigation -->
@include('user.layouts.header')

<!-- Main Content -->

@yield('main-content')
{{--@section('main-content')--}}
    {{--@show--}}


<!-- Footer -->
@include('user.layouts.footer')

</body>

</html>
