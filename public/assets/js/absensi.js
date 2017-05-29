function getkelas() {
  var ProgramKeahlian = document.getElementById("ProgramKeahlian").value;
  var pilihan = null;
  switch(ProgramKeahlian) {
    case "Teknik Komputer dan Jaringan (TKJ)":
    pilihan = "1";
    break;
    case "Adaministrasi Perkantoran (AP)" : 
    pilihan = "2";
    break;
    case "Akuntansi (AK)" : 
    pilihan = "3";
    break;
    case "Perbankan (PBK)" : 
    pilihan = "4";
    break;
    case "Perawatan Kesahatan (PRW)" : 
    pilihan = "5";
    break;
  }

  // clear daftar
  var listkelas = document.getElementById("listkelas");
  while (listkelas.firstChild) {
      listkelas.removeChild(listkelas.firstChild);
  }


  $.ajax({
    url:'../home/kelas/listkelas/' + pilihan,
    type:'GET',
    dataType: 'json',
    success: function( json ) {
      $.each(json, function(i, value) {
        $('#listkelas')
        .append($('<option selected>' + value["nama_kelas"] + '</option>')
          .attr('value', value["nama_kelas"]));
      });
    }
  });
}