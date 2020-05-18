<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cennih</title>

    <style>
        html,
        body{
            font-family: Montserrat, Serif;
            font-size: 1em;
        }
        * {
            padding: 0;
            margin: 0;
            border: 0;
        }
        .logo{
            text-align: left;
            height: 100px;
        }
    </style>
</head>
<body>
<div class="logo">
    <img src="{{ asset('img/logo-v4.png') }}">
</div>
@foreach($payload as $pricing)
    {{$pricing->name}}
@endforeach
</body>
</html>
