function testfunction() {


	var banyakdata = document.getElementById("tableabsenkelas").childElementCount; 
	var x = null;
	var Regex = null;
	var iduser = null;
	// perulangna banyak data untuk crate new input for submit
	for (var i = 0; i < banyakdata; i++) {
		if (i == 0 ) 
		{
			x = document.getElementById("tableabsenkelas").childNodes[1].id;
		} else {
			x = document.getElementById("tableabsenkelas").childNodes[i+i+1].id;
		}
		Regex = /idke-(.*)/;
		iduser = Regex.exec(x); 

		var absensi = $('input[name="absensi-' + iduser[1] +'"]:checked').val();
		var idkelas = $('input[name="idkelas[]"]').val();
		$('#kirimdata').append($('<input type=hidden name=postiduser[] value=' + iduser[1] + '></input>'));
		$('#kirimdata').append($('<input type=hidden name=postabsensi[] value=' + absensi + '></input>'));
		$('#kirimdata').append($('<input type=hidden name=postidkelas[] value=' + idkelas + '></input>'));


		document.getElementById('kirimdata').submit();
	}

}