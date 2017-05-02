$(document).ready(function() {
    //table2
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        // alert(d.id);
        var urlget = "nilai/onlynilai/" + d.id;

        $.ajax({
                url: urlget,
                type:'GET',
                dataType: 'json',
                success: function( json ) {
                    $.each(json, function(i, value) {
                        $('#tabeltest')
                              .append($('<tr><td>Pelajaran</td><td>' + value["kode_mapel"] + '</td></tr>')
                              .attr('value', value["id_nilai    "]));
                    });
                }
        });

        return '<table id="tabeltest" class="table table-striped" cellpadding="5" style="padding-left:50px;">'+
                '<tr>'+
                '<td>User name:</td>'+
                '<td>'+d.username+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>contact no:</td>'+
                '<td>'+d.gender+'</td>'+
                '</tr>'+
                '<tr>'+
                '<td>Extra info:</td>'+
                '<td>And any further details here (images etc)...</td>'+
                '</tr>'+
                '</table>';
        
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

            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        } );
    } );


} );

