$(document).ready(function(){

	$('#tombolCari').hide();

	//event ketika keyword ditulis
	$('#keyword').on('keyup', function(){
		$('#container').load('ajax/mahasiswa.php?keyword='+ $('#keyword').val());
	});


});