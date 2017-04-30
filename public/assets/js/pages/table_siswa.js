 jQuery(document).ready(function()
    {

  

        function restoreRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);

            for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                oTable.fnUpdate(aData[i], nRow, i, false);
            }

            oTable.fnDraw();
        }

        function editRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            var dataGender = ['Laki-laki', 'Perempuan'];
            var dataToHtml = null;
            for (var i = 0; i <= dataGender.length - 1; i++) {
                if (dataGender[i] == aData[2]){
                    dataToHtml += '<option value="' + aData[2] + '" selected>' + aData[2] + '</option>';
                } else {
                    dataToHtml += '<option value="' + dataGender[i] + '">' + dataGender[i] + '</option>';
                }
            }
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<select name="gender"> ' + dataToHtml + '</select>';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<select name="ikelas" id="selectkelas" ></select>';
            jqTds[5].innerHTML = '<a class="edit" href="">Simpan</a>';
            jqTds[6].innerHTML = '<a class="cancel" href="">Batal</a>';
        }

        function CeateRow(oTable, nRow) {
            var aData = oTable.fnGetData(nRow);
            var jqTds = $('>td', nRow);
            jqTds[0].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[0] + '">';
            jqTds[1].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[1] + '">';
            jqTds[2].innerHTML = '<select name="gender"> <option value="Laki-laki">Laki-laki</option><option value="Perempuan" >Perempuan</option></select>';
            jqTds[3].innerHTML = '<input type="text" class="form-control input-small" value="' + aData[3] + '">';
            jqTds[4].innerHTML = '<select name="ikelas" id="selectkelas" ></select>';
            jqTds[5].innerHTML = '<a class="edit" href="">Simpan</a>';
            jqTds[6].innerHTML = '<a class="cancel" href="">Batal</a>';
        }

        function saveRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            var jqSelects = $('select', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate(jqSelects[0].value, nRow, 2, false);
            oTable.fnUpdate(jqInputs[2].value, nRow, 3, false);
            oTable.fnUpdate(jqSelects[1].value, nRow, 4, false);
            oTable.fnUpdate('<a class="edit" href="">Ubah</a>', nRow, 5, false);
            oTable.fnUpdate('<a class="delete" href="">Hapus</a>', nRow, 6, false);
            oTable.fnDraw();
        }

        function cancelEditRow(oTable, nRow) {
            var jqInputs = $('input', nRow);
            oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
            oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
            oTable.fnUpdate('<a class="edit" href="">Ubah</a>', nRow, 2, false);
            oTable.fnDraw();
        }

        var table = $('#sample_editable_1');

        var oTable = table.dataTable({
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "All"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "select":true,
            "responsive":true,
            "language": {
                "lengthMenu": " _MENU_ records"
            },
            "columnDefs": [{ // set default column settings
                'orderable': true,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [0, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = $("#sample_editable_1_wrapper");

        tableWrapper.find(".dataTables_length select").select2({
            showSearchInput: false //hide search box with special css class
        }); // initialize select2 dropdown

        var nEditing = null;
        var nNew = false;

        var oldNik = null;
        var oldKel = null;

        $('#sample_editable_1_new').click(function (e) {
            e.preventDefault();

            if (nNew && nEditing) {
                if (confirm("Data sebelumnya belum di simpan ingin menyimpannya terlebih dahulu ?")) {
                    saveRow(oTable, nEditing); // save
                    $(nEditing).find("td:first").html("Untitled");
                    nEditing = null;
                    nNew = false;

                } else {
                    oTable.fnDeleteRow(nEditing); // cancel
                    nEditing = null;
                    nNew = false;
                    
                    return;
                }
            }
 
            var aiNew = oTable.fnAddData(['', '', '', '', '', '', '']);
            var nRow = oTable.fnGetNodes(aiNew[0]);

            $.ajax({
                url:'../get/listkelas',
                type:'GET',
                dataType: 'json',
                success: function( json ) {
                    $.each(json, function(i, value) {
                        $('#selectkelas')
                              .append($('<option></option>', {text:value["nama_kelas"]})
                              .attr('value', value["nama_kelas"]));

                    });
                }
            });
            CeateRow(oTable, nRow);
            nEditing = nRow;
            nNew = true;
        });

        function getdata()
        {
            

        }
        table.on('click', '.delete', function (e) {
            e.preventDefault();

            if (confirm("Anda yakin ingin meghapus data ini ?") == false) {
                return;
            }

            var nRow = $(this).parents('tr')[0];
            var nodelete = oTable.fnGetData(nRow);
            oTable.fnDeleteRow(nRow);
            $.get("siswa/delete/" + nodelete[0]  , function(data, status){
            });
            //alert("Data Berhasil dihapus !");
        });

        table.on('click', '.cancel', function (e) {
            e.preventDefault();

            if (nNew) {
                oTable.fnDeleteRow(nEditing);
                nNew = false;
            } else {
                restoreRow(oTable, nEditing);
                nEditing = null;
            }
        });

        table.on('click', '.edit', function (e) {
            e.preventDefault();

            /* Get the row as a parent of the link that was clicked on */
            var nRow = $(this).parents('tr')[0];

            if (nEditing !== null && nEditing != nRow) {
                /* Currently editing - but not this row - restore the old before continuing to edit mode */
                restoreRow(oTable, nEditing);
                editRow(oTable, nRow);
                nEditing = nRow;

            } else if (nEditing == nRow && this.innerHTML == "Simpan") {
                /* Editing this row and want to save it */
                // jika add data atau else edit data
                if (nNew) {
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    
                    var nsiswa = oTable.fnGetData(nRow);

                    // post data dengan ajax
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var nsiswa = oTable.fnGetData(nRow);
                    // alert(nsiswa);
                    var data = { nomorinduk: nsiswa[0], namasiswa: nsiswa[1], gender: nsiswa[2], alamat: nsiswa[3], kelas: nsiswa[4]};

                    $.ajax({
                        url: "siswa/tambahsiswa",
                        type: "POST",
                        data: JSON.stringify(data),
                        cache: false,
                        contentType: 'application/json; charset=utf-8',
                        processData: false,
                        success: function (response)
                        {
                            console.log(response);
                        }
                    });

                    //alert("Data Kelas Berhasil Ditambah");
                    nNew = false;
                    // setTimeout(
                    //     function() 
                    //     {
                    //         //Refresh data
                    //         location.reload();
                    //     }, 3000);
                    

                } else {
                    saveRow(oTable, nEditing);
                    nEditing = null;

                    // post data dengan ajax
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    var nsiswa = oTable.fnGetData(nRow);
                    var data = { niklama: oldNik, kellama: oldKel, nomorinduk: nsiswa[0], namasiswa: nsiswa[1], gender: nsiswa[2], alamat: nsiswa[3], kelas: nsiswa[4]};

                    $.ajax({
                        url: "siswa/editsiswa",
                        type: "POST",
                        data: JSON.stringify(data),
                        cache: false,
                        contentType: 'application/json; charset=utf-8',
                        processData: false,
                        success: function (response)
                        {
                            console.log(response);
                        }
                    });

                    //alert("Updated! Do not forget to do some ajax to sync with backend :)"); 
                }
                
            } else {
                /* No edit in progress - let's start one */
                editRow(oTable, nRow);
                nEditing = nRow;
                var oldData = oTable.fnGetData(nRow);
                oldKel = oldData[4];
                oldNik = oldData[0];
                $.ajax({
                    url:'../get/listkelas',
                    type:'GET',
                    dataType: 'json',
                    success: function( json ) {
                        $.each(json, function(i, value) {
                            if ( oldData[4] == value["nama_kelas"] ) {
                                $('#selectkelas')
                                  .append($('<option selected>' + value["nama_kelas"] + '</option>')
                                  .attr('value', value["nama_kelas"]));
                            } else {
                                $('#selectkelas')
                                  .append($('<option></option>', {text:value["nama_kelas"]})
                                  .attr('value', value["nama_kelas"]));
                            }
                        });
                    }
                });

            }
        });
    });