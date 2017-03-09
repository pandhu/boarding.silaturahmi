<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
<body style="display:none" class="bg-siang">
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @if (Auth::check())
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>
        @endif

        <div class="content col-md-12">
            <div class="title m-b-md">
                <form id="search">
                    <h2 class="">Masukkan Kode Boarding (Contoh: GA999)</h2>
                    <div class="form-group col-md-6 col-md-offset-3">
                        <input class="form-control" name="q">
                    </div>
                </form>
            </div>
        </div>
        <img class="roket" src="{{url('img/roket-v2.png')}}">
    </div>
    <!-- Large modal -->

    <div class="modal fade modal-confirm" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Peserta Gathering Afrakids</h4>
                </div>
                <div class="modal-body text-center">

                    <h4>Nama</h4>
                    <h1 id="modal-name"></h1>
                    <div id="modal-penumpang-section">
                        <h4>Penumpang Lainnya</h4>
                        <h2 id="modal-penumpang"></h2>
                    </div>
                    <div id="modal-anak-section">
                        <h4>Anak-anak</h4>
                        <h2 id="modal-anak"></h2>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-close" data-dismiss="modal">Close</button>

                    <button type="button" class="btn btn-primary btn-konfirmasi" data-code="">Konfirmasi</button>
                </div>
            </div><!-- /.modal-content -->

        </div>
    </div>
</div>
<script
src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{url('js/script.js')}}" type="text/javascript"></script>
</body>
</html>
