$(document).ready(function() {

	$("body").css("display", "none");

    $("body").fadeIn(1000);
});
var fadeout = function(){
	$("body").fadeOut(1000, redirectPage);
}

function submitForm(form){

}

$("a.transition").click(function(event){
	event.preventDefault();
	linkLocation = this.href;
});

function redirectPage() {
	window.location = '/selamat-datang';
}

$("#search").submit(function(e) {
	e.preventDefault(); // avoid to execute the actual submit of the form.
	$.ajax({
	  url: "/_search",
	  data: $("#search").serialize(), // serializes the form's elements.
  }).done(function(data) {
	  $('#modal-anak-section').show();
	  $('#modal-penumpang-section').show();
		console.log(data);
		$('#modal-name').html(data.data.name);
		if(data.data.childs == ""){
			$('#modal-anak-section').hide();
		}
		if(data.data.faimily = ""){
			$('#modal-penumpang-section').hide();
		}
		$('#modal-anak').html(data.data.childs.replace(",", "<br>"));
		$('#modal-penumpang').html(data.data.family.replace(",","<br>"));
		$(".btn-konfirmasi").attr('data-code', data.data.code);
		$('.modal-confirm').modal('show');
	  $( this ).addClass( "done" );
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
		  nextPage();
	  }
  }).fail(function(err){
	  console.log(err.responseText);
  });
});
function nextPage(){
	$(".roket").animate({
		bottom: '+=1000',
	}, 2000, 'swing', fadeout);
}
