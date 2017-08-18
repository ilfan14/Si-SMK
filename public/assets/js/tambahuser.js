function getnamasiswa() {
  // clear daftar
  var listsiswa = document.getElementById("listsiswa");
  while (listsiswa.firstChild) {
      listsiswa.removeChild(listsiswa.firstChild);
  }

  var jabatan = document.getElementById('ijabatan');
  var labelsiswa = document.getElementById('labelsiswa');
    if (jabatan.value === 'Orang Tua') {
        labelsiswa.style.display = 'block';
    } else {
        labelsiswa.style.display = 'none';
  }

  var listsiswa = document.getElementById('listsiswa');
    if (jabatan.value === 'Orang Tua') {
        listsiswa.style.display = 'block';
    } else {
        listsiswa.style.display = 'none';
  }


  if (jabatan.value === 'Orang Tua') {

    $.ajax({
      url:'../siswa/daftarsiswa/',
      type:'GET',
      dataType: 'json',
      success: function( json ) {
        $.each(json, function(i, value) {
          $('#listsiswa')
          .append($('<option selected>' + value["name"] + ' - ' + value["nama_kelas"] + '</option>')
            .attr('value', value["id"]));
        });
      }
    });
  }
}