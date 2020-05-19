<!doctype html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cennik</title>

    <style>

        body{
            font-family: DejaVu Sans;
            font-size: 12px;
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
        }
        .logo-wrapper{
            width: 400px;
            text-align: center;
            margin: 0px auto;
            height: 80px;
        }
        .logo{
            padding-top: 20px;
            vertical-align: middle;
        }
        h1{
            font-size: 36px;
            line-height: 48px;
            text-transform: uppercase;
            margin-left: 40px;
            margin-bottom: 20px;
            font-weight: 300;
        }
        h2{
            font-size: 24px;
            line-height: 36px;
            margin-left: 40px;
            margin-bottom: 10px;
            font-weight: 300;
        }
        p{
            font-size: 18px;
            line-height: 24px;
            margin-left: 20px;
            margin-bottom: 5px;
            font-weight: 300;
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
        .break-page-avoid{
            page-break-inside: avoid;
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
    <div class="break-page-avoid">
        <h2>{{ $pricing->name }}</h2>
        <table>
            @foreach($pricing->items as $item)
                <tr>
                    <td class="title" >
                        <span>{{ $item->title }}</span>
                        @if(!empty($item->description))
                            <br>({{ $item->description }})
                        @endif
                    </td>
                    <td class="price" ><span>{{ $item->price }} zł</span></td>
                </tr>
            @endforeach
        </table>
    </div>
@endforeach

</div>

<div class="footer">
    <p>Szczegóły na stronie internetowe {{ config('app.url') }}</p>
</div>


{{--    {{$pricing->name}}--}}
</body>
</html>
