<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Unilink India</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .flex-center .content{
            width:100%;
            border: 1px solid #e7e7e7;
            background: #e7e7e7; 
        }

    </style>
</head>
<body>

<body style="margin: 0px;">
    <img src="https://unilinkindia.co.in/unilink/public/front1/images/logo.png" style="width: 157px;height: 73px;padding-left: 50px;">
    <p style="margin: 20px 10px 30px;padding-left: 40px;">Dear {{ $name }},</p>
    <p style="margin: 10px;padding-left: 40px;">This is to acknowledge receipt of your mail. We will get back to you shortly.</p> 
    <p style="margin: 40px 10px 10px 10px;padding-left: 40px;">Best Regards,</p>
    <p style="margin: 10px;padding-left: 40px;">Support Team</p>
    <p style="margin: 10px;padding-left: 40px;">Unilink India</p>
</body>
</html>