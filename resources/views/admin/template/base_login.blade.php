<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-sUA-Compatible" content="IE=edge">
  
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('admin/css/admin.css')}}">
  <link rel="stylesheet" href="{{asset('admin/css/admin_login.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('css')
</head>

<body class="hold-transition login-page">

  @yield('content')

  <script src="{{asset('admin/js/jquery.min.js')}}"></script>
  <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/js/admin.js')}}"></script>
  
  @yield('js')

</body>

</html>