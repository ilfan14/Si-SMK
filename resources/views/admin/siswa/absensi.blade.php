@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Absensi Siswa
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" />
    
@stop

{{-- Page content --}}
@section('content')

<section class="content-header">
                <!--section starts-->
                <h1>Absensi</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Absensi</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-success" id="hidepanel6">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="share" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                </h3>
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel clickable"></i>
                                </span>
                            </div>
                            <div class="panel-body">
                                <div>Silakan Pilih Program Keahlian dan Kelas</div>
                                <form role="form" action="{{route ('absenkelas') }}" method="POST">
                                        {{ csrf_field() }} 
                                    <div class="form-group">
                                        <label>Program Keahlian</label>
                                        <select class="form-control" id="ProgramKeahlian" name="ProgramKeahlian" onchange="getkelas();">
                                            <option value="-1"></option>
                                            <option >Teknik Komputer dan Jaringan (TKJ)</option>
                                            <option >Adaministrasi Perkantoran (AP)</option>
                                            <option >Akuntansi (AK)</option>
                                            <option >Perbankan (PBK)</option>
                                            <option >Perawatan Kesahatan (PRW)</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <select class="form-control" id="listkelas" name="listkelas" >
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-responsive btn-default" role="button">Lanjutkan</button>
                                    <button type="reset" class="btn btn-responsive btn-default">Batal</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    
    <script src="{{ asset('assets/vendors/jasny-bootstrap/js/jasny-bootstrap.js') }}" ></script>
    <script src="{{ asset('assets/js/absensi.js') }}" ></script>

    
@stop