<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Passcode</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/Login-Form-Dark.css') }}">
</head>

<body>
    <div class="login-dark"><form method="post">
    <h2 class="sr-only">Login Form</h2>
    <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>
    <div class="form-group"><input type="password" name="code" placeholder="Admin Panel Passcode" class="form-control" /></div>
    <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Proceed</button></div><a href="#" class="forgot">Forgot the entry code?</a></form></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>