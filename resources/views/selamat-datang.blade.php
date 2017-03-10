<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Boarding | Gathering Afrakids</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
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
        font-size: 12px;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    .m-b-md {
        margin-bottom: 30px;
    }
    </style>
</head>
<body style="display:none" class="bg-malem text-white font-janda">
    <div class="flex-center position-ref full-height">
        <div class="content col-md-12">
            <div class="m-b-md">
                <h1 class="">Terima Kasih telah melakukan registrasi</h1>
                <h3>Kini Anda resmi mengikuti Silaturahmi Afrakids 2017</h3>
                <h3>Siapkan diri menuju percepatan peningkatan kapasitas diri Anda</h3>
                <h3>Grow Up Together!</h3>

            </div>
            <div class="clearfix"></div>
            <a  href="{{url('')}}" class="btn btn-default">Kembali</a>
        </div>

    </div>
    <!-- Large modal -->
</div>
<script
src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('js/script.js')}}" type="text/javascript"></script>
<script  type="text/javascript">
    setTimeout(fade, 10000); //will call the function after 2 secs.

   function fade(){
       $("body").fadeOut(1000, redirect);
   }

   function redirect(){
       window.location.href = "{{url('/')}}"; //will redirect to your blog page (an ex: blog.html)
   }
</script>
</body>
</html>
