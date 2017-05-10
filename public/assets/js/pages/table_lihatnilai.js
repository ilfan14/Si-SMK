$(document).ready(function() {
    var iddiklik = null;
    var namadiklik = null;
    var kodenilaidiklik = null;
    //table2
    /* Formatting function for row details - modify as you need */
    // fungsi untuk mengecek objek ada isinya apa tidak penggunaan if
    function isEmpty(obj) {

        // null and undefined are "empty"
        if (obj == null) return true;

        // Assume if it has a length property with a non-zero value
        // that that property is correct.
        if (obj.length > 0)    return false;
        if (obj.length === 0)  return true;

        // If it isn't an object at this point
        // it is empty, but it can't be anything *but* empty
        // Is it empty?  Depends on your application.
        if (typeof obj !== "object") return true;

        // Otherwise, does it have any properties of its own?
        // Note that this doesn't handle
        // toString and valueOf enumeration bugs in IE < 9
        for (var key in obj) {
            if (hasOwnProperty.call(obj, key)) return false;
        }

    return true;
    }
    function format ( d ) {
        // `d` is the original data object for the row
        // alert(d.id);
        var urlget = "nilai/onlynilai/" + d.id;
        iddiklik = d.id;
        namadiklik = d.name;

        $.ajax({
                url: urlget,
                type:'GET',
                dataType: 'json',
                success: function( json ) {
                    if(!isEmpty(json)){

                        $('#tabeltest')
                            .append($('<thead>' +
                                        '<tr>' + 
                                        '<th>Nama Mata Pelajaran</th>' + 
                                        '<th>Nilai</th>' + 
                                        '<th>Keterangan</th>' + 
                                        '<tr>' +
                                        '</thead>'+
                                        '<tbody id="tabelnilai">'+
                                        '</tbody>' )
                            );
                    
                        $.each(json, function(i, value) {
                            // $('#tabeltest')
                            //       .append($('<tr><td>Pelajaran</td><td>' + value["kode_mapel"] + '</td></tr>')
                            //       .attr('value', value["id_nilai"]));

                           
                            document.getElementById("datanilai").innerHTML = "Data Nilai Siswa";
                            $('#tabelnilai')
                                .append($('<tr role="row" id="nilaidata' + value["id_nilai"] + '"></tr>')
                                );
                            $('#nilaidata' + value["id_nilai"])
                                .append($('<td>' + value["nama_mapel"] + '</td><td>' + value["nilai"] + '</td><td>' + value["keterangan"] + '</td><td><a class="btn btn-success btn-large" id="tomboledit" href="nilai/deletenilai/' + value["id_nilai"] + '" >Hapus</a></td>')
                                );
                            

                        });

                    } else {
                        console.log("nodata");
                    }
                    
                }
        });

        // return '<table id="tabeltest" class="table table-striped" cellpadding="5" style="padding-left:50px;">'+
        //         '<tr>'+
        //         '<td>User name:</td>'+
        //         '<td>'+d.username+'</td>'+
        //         '</tr>'+
        //         '<tr>'+
        //         '<td>contact no:</td>'+
        //         '<td>'+d.gender+'</td>'+
        //         '</tr>'+
        //         '<tr>'+
        //         '<td>Extra info:</td>'+
        //         '<td>And any further details here (images etc)...</td>'+
        //         '</tr>'+
        //         '</table>';


        return '<div id="datanilai" style="text-align: center;"> Tidak Ada Data </div>' + 
                '<table id="tabeltest" class="table table-striped" cellpadding="5" style="padding-left:50px;">' +
                '</table> ' +
                '<a class="btn btn-success btn-large" id="tomboltambah" data-toggle="modal" data-href="#responsive" href="#responsive">Tambah Nilai</a>';
        
    }

    $(document).ready(function() {
        var table2 = $('#table2').DataTable( {
            "ajax": "nilai/siswawithnilai",
            "columns": [
                {
                    "className":      'details-control',
                    "orderable":      false,
                    "data":           null,
                    "defaultContent": ''
                },
                { "data": "id" },
                { "data": "username" },
                { "data": "name" },
                { "data": "nama_kelas" },
                { "data": "gender" }
            ],
            "order": [[1, 'asc']],
            "responsive":true
        } );

        // Add event listener for opening and closing details
        $('#table2 tbody').on('click', 'td', function () {
            var tr = $(this).closest('tr');
            var row = table2.row( tr );
            var ygdiklik = ($(this).attr('colspan'));
            var buttondiklik = null;

             // if untuk menghilangkan error console 
            if(($(this).attr('class')) == ' details-control') {

            } else {
                buttondiklik = this.childNodes[0].id;
                buttondiklikval = this.childNodes[0].value;
            }



            // mengambil id dari button edit / delete
            // var buttondiklik = this.childNodes[0].id;
            // console.log(buttondiklik);
           // console.log(this);
            if (ygdiklik == 6 && buttondiklik != 'tomboledit'){
                console.log('masuk if not else');
                $('#idsiswa').attr('value', iddiklik);
                $('#namasiswa').attr('value', namadiklik);

                // aneh data tidak terhapus jika tidak dua kali 
                var list = document.getElementById("kodemapel");          
                console.log(list.length);
                for (var i = list.length - 1; i >= 0; i--) {
                    list.removeChild(list.childNodes[i]);
                };
                var listkedua = document.getElementById("kodemapel");         
                console.log(listkedua.length);
                for (var i = listkedua.length - 1; i >= 0; i--) {
                    listkedua.removeChild(listkedua.childNodes[i]);
                };
                // end keanehan

                $.ajax({
                    url: 'mapel/listkodemapel',
                    type:'GET',
                    dataType: 'json',
                    success: function( json ) {
                        if(!isEmpty(json)){

                            
                            $.each(json, function(i, value) {

                                $('#kodemapel')
                                    .append($('<option value="' + value["kode_mapel"] + '">' + value["kode_mapel"] + '</option>')
                                    );
                            });

                        } else {
                            console.log("nodata");
                        }
                        
                    }
                });


                
            } else {
                console.log('masuk else');
               
                if (buttondiklik == 'tomboledit'){
                    console.log(buttondiklik);
                    console.log(buttondiklikval);

                } else {
                    if ( row.child.isShown() ) {
                        // This row is already open - close it
                        row.child.hide();
                        tr.removeClass('shown');
                    } else {
                        // Open this row
                        row.child( format(row.data()) ).show();
                        tr.addClass('shown');
                    }
                }
            }
            
                
            
        } );

        

    } );


} );

