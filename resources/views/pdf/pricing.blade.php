<!doctype html>
<html lang="pl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Cennik</title>

    <style>

        /**
               Set the margins of the page to 0, so the footer and the header
               can be of the full height and width !
            **/
        @page {
            margin: 0;
        }

        header {
            position: fixed;
            height: 3cm;

            /** Extra personal styles **/
            text-align: center;
            line-height: 1.5cm;
            margin-bottom: 20px;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            text-align: center;
        }

        body{
            font-family: DejaVu Sans;
            font-size: 12px;
            width: 100%;
            border: 2px solid #901867;
            margin: 3cm 1cm 2cm 1cm;
        }

        * {
            padding: 0;
            margin: 0;
            border: 0;
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
        .logo-wrapper{
            width: 400px;
            text-align: center;
            margin: 0px auto;
            padding: 10px;
            /*height: 80px;*/
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
            font-weight: normal;
        }
        h2{
            font-size: 24px;
            line-height: 36px;
            margin-left: 40px;
            margin-bottom: 10px;
            font-weight: normal;
        }
        p{
            font-size: 18px;
            line-height: 24px;
            margin-left: 20px;
            margin-bottom: 5px;
            font-weight: normal;
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
<!-- Define header and footer blocks before your content -->
<header>
    <div class="logo-wrapper">
        <img class="logo" src="{{ asset('img/logo_bez_tla.png') }}" width="300px">
    </div>
</header>

<footer>
    <div class="footer">
        <p>Szczegóły na stronie internetowej {{ config('app.url') }}</p>
    </div>
</footer>

<main>
    <div class="body">
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
</main>
</body>
</html>
