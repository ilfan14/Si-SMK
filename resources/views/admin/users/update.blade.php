@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Update Pengguna
    @parent
@stop

{{-- page level styles --}}
@section('header_styles')

    <link href="{{ asset('assets/css/pages/form2.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/pages/form3.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/intl-tel-input/build/css/intlTelInput.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>

@stop

{{-- Page content --}}
@section('content')

    <section class="content-header">
        <!--section starts-->
        <h1>Update Pengguna</h1>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="search" data-size="16" data-loop="true" data-c="#fff"
                               data-hc="white"></i>
                            Update Pengguna : {{$user->name}}
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>

                    </div>
                    <div class="panel-body">
                        <form method="POST" name="FormUpdate" onsubmit="return Validation()" enctype="multipart/form-data"
                              action="{{ route('updateprofile', $user->id) }}">
                              {{ csrf_field() }}
                              {{ method_field('PUT') }}

                            <input type="text" hidden value="updateprofile" name="tipeform"> </input>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="txtUsername" class="control-label">Username</label>

                                        <input type="text" name="iusername" id="iusername" class="form-control input-md" value="{{$user->username}}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="txtPassword" class="control-label">Password</label> <label style="color: red;"> * tidak perlu di isi jika tidak dirubah</label>

                                        <input type="password" name="ipassword" id="ipassword" class="form-control input-md" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="txtJabatan" class="control-label">Jabatan : </label>
                                 
                                        
                                        {{ Form::select('ijabatan', ['Guru' => 'Guru', 'Admin' => 'Admin', 'Orang Tua' => 'Orang Tua'], $user->job, ['id' => 'ijabatan', 'onchange' => 'getnamasiswa();', 'class' => 'form-control select2']) }}

                                        <label hidden id="labelsiswa" for="txtnamasiswa" class="control-label">Nama Siswa : </label>
                                        <select hidden id="listsiswa" name="listsiswa" class="form-control select2" >
                                        </select>

                                        @if ($user->job == 'Orang Tua')
                                        <input hidden value="{{$siswa->id}}" name="tmpidsiswa" id="tmpidsiswa"></input>
                                        @else 
                                        <input hidden value="0" name="tmpidsiswa" id="tmpidsiswa"></input>

                                        @endif

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="txtStatus" class="control-label">Status Akun : </label>
                                        {{ Form::select('istatus', ['nonaktif' => 'Non-Aktif', 'aktif' => 'Aktif'], $user->status,  ['class' => 'form-control select2']) }}

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="txtName" class="control-label">Nama</label>
                                        <input type="text" name="inama" id="inama" class="form-control input-md" value="{{$user->name}}" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtjeniskelamin" class="control-label">Jenis Kelamin</label>
                                    {{ Form::select('ijeniskelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], '', ['class' => 'form-control select2']) }}

                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtEmail" class="control-label">Email</label>
                                    <input type="text" name="iemail" id="iemail" class="form-control input-md"
                                           value="{{$user->email}}" >
                                </div>
                            </div>


                            @if ($user->job != 'Orang Tua')
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtTempatLahir" class="control-label">Tempat Lahir</label>
                                    <input type="text" name="itempatlahir" id="itempatlahir" class="form-control input-md"
                                           value='{{ $datapengguna->tempat_lahir }}' >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtDate" class="control-label">Tanggal Lahir</label>
                                    <input type="date" name="itanggallahir" id="itanggallahir" class="form-control input-md"
                                           value='{{ $datapengguna->tanggal_lahir }}' >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtAddress1" class="control-label">Alamat</label>
                                    <input type="text" name="ialamat" id="ialamat"
                                           class="form-control input-md" value='{{ $datapengguna->alamat }}' >
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtPhone" class="control-label">No HP</label>                             
                                    <input type="text" name="inohp" id="inohp" class="form-control input-md"
                                           value='0{{ $datapengguna->no_hp }}' >
                                </div>
                            </div>

                            @else

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtTempatLahir" class="control-label">Tempat Lahir</label>
                                    <input type="text" name="itempatlahir" id="itempatlahir" class="form-control input-md"
                                           value='{{ $datapengguna->tempat_lahir_ortu }}' >
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtDate" class="control-label">Tanggal Lahir</label>
                                    <input type="date" name="itanggallahir" id="itanggallahir" class="form-control input-md"
                                           value='{{ $datapengguna->tanggal_lahir_ortu }}' >
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtAddress1" class="control-label">Alamat</label>
                                    <input type="text" name="ialamat" id="ialamat"
                                           class="form-control input-md" value='{{ $datapengguna->alamat_ortu }}' >
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtPhone" class="control-label">No HP</label>                             
                                    <input type="text" name="inohp" id="inohp" class="form-control input-md"
                                           value='0{{ $datapengguna->no_hp_ortu }}' >
                                </div>
                            </div>

                            @endif

                            <div class="col-md-12 mar-10">
                                <div class="col-xs-6 col-md-6">
                                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Simpan"
                                           class="btn btn-primary btn-block btn-md btn-responsive">
                                </div>
                                <div class="col-xs-6 col-md-6">
                                    <input type="reset" value="Batal"
                                           class="btn btn-success btn-block btn-md btn-responsive">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <!--row ends-->
    </section>
    <!-- content -->

@stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/vendors/intl-tel-input/js/intlTelInput.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ asset('assets/js/pages/validationUpdateUser.js') }}" type="text/javascript"></script>
    <script type="text/javascript">

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
              url:'../../siswa/daftarsiswa/',
              type:'GET',
              dataType: 'json',
              success: function( json ) {
                $.each(json, function(i, value) {
                    idsiswa = document.getElementById('tmpidsiswa');
                        if (value["id"] == idsiswa.value)
                        {
                            $('#listsiswa')
                            .append($('<option selected>' + value["name"] + ' - ' + value["nama_kelas"] + '</option>')
                              .attr('value', value["id"]));
                        } else {
                            $('#listsiswa')
                            .append($('<option>' + value["name"] + ' - ' + value["nama_kelas"] + '</option>')
                              .attr('value', value["id"]));
                        }
                });
              }
            });
          }
        }

        

    </script>

    <script type="text/javascript"> 
        window.addEventListener("load", function(){

            var jabatan = document.getElementById('ijabatan');
            var labelsiswa = document.getElementById('labelsiswa');
            var listsiswa = document.getElementById('listsiswa');

            if (jabatan.value === 'Orang Tua') {
                labelsiswa.style.display = 'block';
                listsiswa.style.display = 'block';
                $.ajax({
                    url:'../../siswa/daftarsiswa/',
                    type:'GET',
                    dataType: 'json',
                    success: function( json ) {
                      $.each(json, function(i, value) {
                        idsiswa = document.getElementById('tmpidsiswa');
                        if (value["id"] == idsiswa.value)
                        {
                            $('#listsiswa')
                            .append($('<option selected>' + value["name"] + ' - ' + value["nama_kelas"] + '</option>')
                              .attr('value', value["id"]));
                        } else {
                            $('#listsiswa')
                            .append($('<option>' + value["name"] + ' - ' + value["nama_kelas"] + '</option>')
                              .attr('value', value["id"]));
                        }
                        
                      });
                    }
                });

              } else {
                  labelsiswa.style.display = 'none';
                  listsiswa.style.display = 'none';

            }



        })
    </script>

    
@stop
