@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Edit User
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
        <h1>Edit User</h1>
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
                            Form Edit User : {{ $user->name }}
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>

                    </div>
                    <div class="panel-body">
                        <form method="POST" name="frmOnline" onsubmit="return Validation()" enctype="multipart/form-data"
                              action="{{ route('updateprofile', $user->id) }}">
                              {{ method_field('PUT') }}
                              {{ csrf_field() }}

                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                    <label for="txtName" class="control-label">Nama</label>

                                        <input type="text" name="inama" id="inama" class="form-control input-md"
                                               value='{{ $user->name }}' >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtEmail" class="control-label">Email</label>
                                    <input type="text" name="iemail" id="iemail" class="form-control input-md"
                                           value='{{ $user->email }}' >
                                </div>
                            </div>

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
                                    <label for="e1" class="control-label">Jenis Kelamin</label>
                                    {{ Form::select('ijeniskelamin', ['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], $user->gender, ['class' => 'form-control select2']) }}

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtPhone" class="control-label">No HP</label>                             
                                    <input type="text" name="inohp" id="inohp" class="form-control input-md"
                                           value='0{{ $datapengguna->no_hp }}' >
                                </div>
                            </div>
        
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

    <script src="{{ asset('assets/js/pages/validation.js') }}" type="text/javascript"></script>
    {{-- <script>
         $("#phone").intlTelInput();
     </script>
     --}}
@stop
