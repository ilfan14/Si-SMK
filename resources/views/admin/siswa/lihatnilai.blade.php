@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Data Nilai Siswa
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />

    <!--  penambahan show modal -->
    <link href="{{ asset('assets/vendors/modal/css/component.css') }}" rel="stylesheet" />

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Data Nilai Siswa</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">DataTables</a>
                    </li>
                    <li class="active">Data Nilai Siswa</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <!-- row-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info filterable">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title pull-left">
                                    <i class="livicon" data-name="gift" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Tabel Data Nilai Siswa
                                </h3>
                            </div>
                            <div class="panel-body table-responsive">
                                <table class="table table-striped table-bordered" id="table2">
                                    <thead>
                                    <tr>
                                        <th style="width: 20px;"></th>
                                        <th>Id User</th>
                                        <th>Nik</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jenis Kelamin</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!--- responsive model -->
                <div class="modal fade in" id="responsive" tabindex="-1" role="dialog" aria-hidden="false" style="display:none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form action="{{ route('tambahnilai') }}" autocomplete="on" method="post" role="form">
                                <!-- CSRF Token -->
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title">Tambah Nilai</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <p>
                                                    <label>Id Siswa</label>
                                                    <input readonly="readonly" id="idsiswa" name="idsiswa" type="text" placeholder="Id Siswa" class="form-control " value="ID">
                                                </p>
                                                <p>
                                                    <label>Nama Siswa</label>
                                                    <input readonly="readonly" id="namasiswa" name="namasiswa" type="text" placeholder="Nama Siswa" class="form-control disable">
                                                </p>
                                                <p>
                                                    <label>Kode Mata Pelajaran</label>
                                                    <input id="name2" name="kodemapel" type="text" placeholder="Kode Mata Pelajaran" class="form-control">
                                                </p>
                                                <p>
                                                    <label>Nilai </label>
                                                    <input id="name3" name="nilai" type="text" placeholder="Nilai" class="form-control">
                                                </p>
                                                <p>
                                                    <label>Keterangan </label>
                                                    <input id="keterangan" name="keterangan" type="text" placeholder="Keterangan" class="form-control">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-dismiss="modal" class="btn">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
                <!-- END modal-->

            </section>
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/table_lihatnilai.js') }}" ></script>


    <!-- show modal js  -->
    <script src="{{ asset('assets/vendors/modal/js/classie.js') }}" ></script>
    <script src="{{ asset('assets/vendors/modal/js/modalEffects.js') }}" ></script>
@stop
