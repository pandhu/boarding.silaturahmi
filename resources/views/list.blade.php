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
    <link href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <link href="{{url('css/style.css')}}" rel="stylesheet" type="text/css">

    <!-- Styles -->
</head>
<body style="display:none" class="">
<table id="peserta">
<thead>
    <tr>
        <th>Nama</th>
        <th>Kode</th>
        <th>Peserta Lainnya</th>
        <th>Anak</th>
        <th>Present</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach($pesertas as $item)
    <tr>
        <td>{{$item->name}}</td>
        <td>{{$item->code}}</td>
        <td>{{$item->family}}</td>
        <td>{{$item->childs}}</td>
        <td>{{$item->present_date}}</td>
        <td>
            <a data-code="{{$item->code}}" class="btn btn-success">Konfirmasi</a>
            <a class="btn btn-danger" data-code="{{$item->code}}">Batal</a>
        </td>
    </tr>
@endforeach
</tbody>
</table>

<div class="modal fade modal-confirm font-janda" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">Peserta Gathering Afrakids</h4>
            </div>
            <div class="modal-body text-center">
                <div class="content-not-available">
                    <h1>Data Tidak Ditemukan</h1>
                </div>
                <div class="content-available">
                    <h4>Nama</h4>
                    <h1 class="modal-name"></h1>
                    <div class="modal-penumpang-section">
                        <h4>Penumpang Lainnya</h4>
                        <h2 class="modal-penumpang"></h2>
                    </div>
                    <div class="modal-anak-section">
                        <h4>Anak-anak</h4>
                        <h2 class="modal-anak"></h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-close" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary btn-konfirmasi" data-code="">Konfirmasi</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>

<div class="modal fade modal-cancel font-janda" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalLabel">BATALKAN KONFIRMASI</h4>
            </div>
            <div class="modal-body text-center">
                <div class="content-not-available">
                    <h1>Data Tidak Ditemukan</h1>
                </div>
                <div class="content-available">
                    <h4>Nama</h4>
                    <h1 class="modal-name"></h1>
                    <div class="modal-penumpang-section">
                        <h4>Penumpang Lainnya</h4>
                        <h2 class="modal-penumpang"></h2>
                    </div>
                    <div class="modal-anak-section">
                        <h4>Anak-anak</h4>
                        <h2 class="modal-anak"></h2>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-close" data-dismiss="modal">Close</button>

                <button type="button" class="btn btn-primary btn-cancel" data-code="">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<script
src="https://code.jquery.com/jquery-3.1.1.min.js"
integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="{{url('js/script.js')}}" type="text/javascript"></script>
<script>
$(document).on('click', ".btn-success", function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
    var code = $(this).attr('data-code');
    console.log(code);
	$.ajax({
		url: "/_search",
		data: {'q':code}, // serializes the form's elements.
	}).done(function(data) {
        console.log(data);
		if(data.response == 404){
			$('.modal-confirm .content-available').hide();
			$('.modal-confirm .content-not-available').show();
			$('.modal-confirm .btn-konfirmasi').hide();
			$('.modal-confirm .btn-close').show();
		} else {
			$('.modal-confirm .content-available').show();
			$('.modal-confirm .content-not-available').hide();
			$('.modal-confirm .btn-konfirmasi').show();
			$('.modal-confirm .btn-close').hide();
			$('.modal-confirm .modal-anak-section').show();
			$('.modal-confirm .modal-penumpang-section').show();

			$('.modal-confirm .modal-name').html(data.data.name);
			if(data.data.childs == ""){
				$('.modal-confirm .modal-anak-section').hide();
			}
			if(data.data.faimily = ""){
				$('.modal-confirm .modal-penumpang-section').hide();
			}
			$('.modal-confirm .modal-anak').html(data.data.childs.replace(",", "<br>"));
			$('.modal-confirm .modal-penumpang').html(data.data.family.replace(",","<br>"));
			$(".modal-confirm .btn-konfirmasi").attr('data-code', code);
		}


		$('.modal-confirm').modal('show');

	});
});

$(document).on('click', ".btn-danger", function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
    var code = $(this).attr('data-code');
    console.log(code);
	$.ajax({
		url: "/_search",
		data: {'q':code}, // serializes the form's elements.
	}).done(function(data) {
        console.log(data);
        if(data.response == 404){
			$('.modal-cancel .content-available').hide();
			$('.modal-cancel .content-not-available').show();
			$('.modal-cancel .btn-konfirmasi').hide();
			$('.modal-cancel .btn-close').show();
		} else {
			$('.modal-cancel .content-available').show();
			$('.modal-cancel .content-not-available').hide();
			$('.modal-cancel .btn-konfirmasi').show();
			$('.modal-cancel .btn-close').hide();
			$('.modal-cancel .modal-anak-section').show();
			$('.modal-cancel .modal-penumpang-section').show();

			$('.modal-cancel .modal-name').html(data.data.name);
			if(data.data.childs == ""){
				$('.modal-cancel .modal-anak-section').hide();
			}
			if(data.data.faimily = ""){
				$('.modal-cancel .modal-penumpang-section').hide();
			}
			$('.modal-cancel .modal-anak').html(data.data.childs.replace(",", "<br>"));
			$('.modal-cancel .modal-penumpang').html(data.data.family.replace(",","<br>"));
			$(".modal-cancel .btn-cancel").attr('data-code', code);
		}


		$('.modal-cancel').modal('show');

	});
});


$(".btn-konfirmasi").click(function(){
	var code = $(this).attr('data-code');
	console.log(code);
	$.ajax({
		url: "/_konfirmasi",
		method: "POST",
		data: {'code': code}, // serializes the form's elements.
	}).done(function(data) {
		console.log(data);
		$('.modal-confirm').modal('hide');
		if(data.response == 200){
            window.location = "{{url('list')}}";
		}
	}).fail(function(err){
		console.log(err.responseText);
	});
});

$(".btn-cancel").click(function(){
	var code = $(this).attr('data-code');
	console.log(code);
	$.ajax({
		url: "/_cancel",
		method: "POST",
		data: {'code': code}, // serializes the form's elements.
	}).done(function(data) {
		console.log(data);
		$('.modal-confirm').modal('hide');
		if(data.response == 200){
            window.location = "{{url('list')}}";
		}
	}).fail(function(err){
		console.log(err.responseText);
	});
});
$(document).ready(function(){
    $('#peserta').DataTable();
});
</script>
</body>
</html>
