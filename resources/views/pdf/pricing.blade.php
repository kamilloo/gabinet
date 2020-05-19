<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cennik</title>

    <style>
        @font-face {
            font-family: 'Open Sans';
            font-style: normal;
            font-weight: normal;
            src: url(http://themes.googleusercontent.com/static/fonts/opensans/v8/cJZKeOuBrn4kERxqtaUH3aCWcynf_cDxXwCLxiixG1c.ttf) format('truetype');
        }

        body{
            font-family: "Open Sans", SansSerif;
            font-size: 1em;
            width: 100%;
            margin: 10px;
            border: 2px solid #901867;
        }

        * {
            padding: 0;
            margin: 0;
            border: 0;
        }
        .header{
            height: 100px;
            margin-bottom: 20px;
        }
        .body{
            width: 80%;
            margin: 0 auto;

        }
        .footer{
            bottom: 0px;
            height: 100px;
            text-align: center;
        }
        .footer p{
            font-size: 14px;
            line-height: 20px;
            font-style: italic;
        }
        .logo-outer-wrapper{
            width: 400px;
            text-align: center;
            margin: 0 auto;
            padding: 10px;
            height: 80px;
            border-bottom: 2px solid #901867;
            border-left: 2px solid #901867;
            border-right: 2px solid #901867;

        }
        .logo-wrapper{
            width: 400px;
            text-align: center;
            margin: 0px auto;
            height: 80px;
            border: 2px solid #901867;

        }
        .logo{
            padding-top: 20px;
            vertical-align: middle;
        }
        h1{
            font-size: 48px;
            line-height: 60px;
            text-transform: uppercase;
            margin-left: 40px;
            margin-bottom: 20px;
        }
        h2{
            font-size: 36px;
            line-height: 50px;
            margin-left: 40px;
            margin-bottom: 10px
        }
        p{
            font-size: 24px;
            line-height: 30px;
            margin-left: 20px;
            margin-bottom: 5px
        }
        table{
            width: 100%;
            margin-bottom: 20px;
        }
        table td.title{
            width: 20%;
            text-align: left;
        }
        table td.price{
            width: 20%;
            text-align: right;
        }
    </style>
</head>
<body>
<div class="header">
    <div class="logo-outer-wrapper">
        <div class="logo-wrapper">
            <img class="logo" src="{{ asset('img/logo-v4.png') }}">
        </div>
    </div>

</div>
<div class="body">
    <h1>Cennik</h1>
@foreach($payload as $pricing)
    <h2>{{ $pricing->name }}</h2>
    <table>
        @foreach($pricing->items as $item)
        <tr>
            <td class="title" >
                <span>{{ $item->title }}</span>
                @if(!empty($item->description))
                    <li>({{ $item->description }})</li>
                @endif
            </td>
            <td class="price" ><span>{{ $item->price }} zł</span></td>
        </tr>
        @endforeach
    </table>
@endforeach

</div>

<div class="footer">
    <p>Szczegóły na stronie internetowe {{ config('app.url') }}</p>
</div>


{{--    {{$pricing->name}}--}}
</body>
</html>
