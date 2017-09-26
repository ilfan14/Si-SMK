@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Daftar Siswa
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/select2/css/select2-bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pages/tables.css') }}" />
    <meta name="csrf-token" content="{{csrf_token()}}">

@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <h1>Daftar Siswa</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Daftar Siswa</li>
                </ol>
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </section>
            <!-- Main content -->
            <section class="content">
                <!-- Second Data Table -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                        <div class="portlet box default">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Daftar Siswa
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-toolbar">
                                    <div class="btn-group">
                                        <a href="{{ route('addsiswa') }}" class=" btn btn-custom">
                                            Tambah
                                            <i class="fa fa-plus"></i>
                                        </a>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                            Alat
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right">
                                            <li>
                                                <a href="#">Cetak</a>
                                            </li>
                                            <li>
                                                <a href="#">Save as PDF</a>
                                            </li>
                                            <li>
                                                <a href="#">Export ke Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="sample_editable_1_wrapper" class="">
                                    <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="">Nomor Induk</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Full Name
                                            : activate to sort column ascending" style="width: 300px;">Nama</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Gender
                                            : activate to sort column ascending" style="width: 20px;">Gender</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Alamat
                                            : activate to sort column ascending" style="width: 200px;">Alamat</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Kelas
                                            : activate to sort column ascending" style="width: 30px;">Kelas</th>
                                                
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Edit
                                            : activate to sort column ascending" style="width: 20px;">Ubah</th>
                                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                                 Delete
                                            : activate to sort column ascending" style="width: 20px;">Hapus</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($siswa as $siswa)
                                                @if ($loop->index % 2 )
                                                    <tr role="row" class="even">
                                                @else 
                                                    <tr role="row" class="odd">
                                                @endif
                                                
                                                <td class="sorting_1">{!! $siswa->username !!}</td>
                                                <td>{!! $siswa->name !!}</td>
                                                <td>{!! $siswa->gender !!}</td>
                                                <td>{!! $siswa->alamat !!}</td>
                                                <td>{!! $siswa->nama_kelas !!}</td>
                                                <td>
                                                    <a href="{{route('updatesiswa', $siswa->id )}}" style="width: 20px;">Ubah</a>
                                                </td>
                                                <td>
                                                    <a class="delete" href="javascript:;" style="width: 20px;">Hapus</a>
                                                </td>
                                                </tr>
                                            @endforeach

                                    
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->

                                <div id="myselect">
                                    <select >
                                        <option  value=""></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.responsive.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/select2/js/select2.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/js/pages/table_siswa.js') }}" ></script>
@stop
