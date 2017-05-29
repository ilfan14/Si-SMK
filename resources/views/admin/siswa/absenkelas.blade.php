@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Simple Tables
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!-- page level css -->
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Jam Waktu</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Absensi Kelas </li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN CONDENSED TABLE PORTLET-->
                        <div class="portlet box warning">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="film" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Absensi Kelas (KELAS)
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 20px;">No</th>
                                                <th >Nama Siswa</th>
                                                <th style="width: 150px;">Jenis Kelamin</th>
                                                <th >Agama</th>
                                                <th style="width: 30px; position: absolute;">Absensi</th>
                                                <th style="width: 30px;"> </th>
                                                <th style="width: 30px;"> </th>
                                                <th style="width: 30px;"> </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($siswa as $siswa)
                                                <tr>
                                                <td>{!! $loop->index+1 !!}</td>
                                                <td>{!! $siswa->name !!}</td>
                                                <td>{!! $siswa->gender !!}</td>
                                                <td>{!! $siswa->agama !!}</td>
                                                <td style="width: 30px;"> H </td>
                                                <td> <span class="label label-sm label-danger"> A </span></td>
                                                <td> <span> I </span></td>
                                                <td> <span> S </span></td>
                                                <td> <span> P </span></td>
                                                </tr>
                                            @endforeach


                                        </tbody>
                                    </table>
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
@stop
