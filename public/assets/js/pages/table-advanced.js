$(document).ready(function() {
    //table tools example
    var table = $('#table1').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });


    //re-order columns
    var table2 = $('#table2').dataTable({
        responsive:true
    });

    new $.fn.dataTable.ColReorder(table2);


    // add row, delete row example
    var table3 = $('#table3').DataTable({
        "order": [
            [0, "desc"]
        ],
        responsive:true
    });
    //total number of existing rows
    var counter = 18;


    //row addition code
    $('#addButton').on('click', function() {
        table3.row.add([
            counter,
            counter + ' new',
            counter + ' user',
            counter + '_unique_user',
            counter + '_unique_user@domain.com'
        ]).draw();

        counter++;
    });

    //row deletion code

    $('#table3 tbody').on('click', 'tr', function() {
        if ($(this).hasClass('danger')) {
            $(this).removeClass('danger');
        } else {
            table3.$('tr.danger').removeClass('danger');
            $(this).addClass('danger');
        }
    });

    $('#delButton').click(function() {
        if (!$("#table3 tr").hasClass('danger')) {
            alert('please select a row first');
            //exit;
        }
        table3.row('.danger').remove().draw(false);
    });

});
    $('#sample_5').dataTable( {

        "scrollY": "200px",
        "dom": "frtiS",
        "deferRender": true,
        responsive:true
});