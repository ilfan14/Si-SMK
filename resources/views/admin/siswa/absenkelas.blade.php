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
                <h1>{!! $tglsekarang !!}</h1>
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
                                    Absensi Kelas {!! $kelas !!}
                                </div>
                            </div>
                            <div class="portlet-body" >
                                <div class="table-scrollable" >
                                    <form action="javascript:submitFunction();" >
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20px;">No</th>
                                                    <th >Nama Siswa</th>
                                                    <th style="width: 150px;">Jenis Kelamin</th>
                                                    <th >Agama</th>
                                                    <th style="width: 150px; position: absolute;">Absensi</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody id="tableabsenkelas">
                                                
                                                    
                                                
                                                @foreach ($siswa as $siswa)
                                                    <tr id=idke-{!! $siswa->id !!}>
                                                        <input type="hidden" name="iduser[]" value={!! $siswa->id !!} >
                                                        <input type="hidden" name="idkelas[]" value={!! $siswa->id_kelas !!} >
                                                        <td>{!! $loop->index+1 !!}</td>
                                                        <td>{!! $siswa->name !!}</td>
                                                        <td>{!! $siswa->gender !!}</td>
                                                        <td>{!! $siswa->agama !!}</td>
                                                        <td style="width: 150px;"> 
                                                            <input type="radio" name="absensi-{!! $siswa->id !!}" value="H" required> <label> H</label>
                                                            <input type="radio" name="absensi-{!! $siswa->id !!}" value="A" > <label> A</label>
                                                            <input type="radio" name="absensi-{!! $siswa->id !!}" value="I" > <label> I</label>
                                                            <input type="radio" name="absensi-{!! $siswa->id !!}" value="S" > <label> S</label>
                                                            <input type="radio" name="absensi-{!! $siswa->id !!}" value="P" > <label> P</label>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div style="text-align: right;">
                                        <button type="submit" role="button" class="btn btn-default" >Simpan</button>
                                        </form>

                                            
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>

            <form method="POST" action="{{ route ('doabsen') }}" id="kirimdata"> 
            {{ csrf_field() }} 
            
            </form>
            <!-- content -->
        
    @stop

{{-- page level scripts --}}
@section('footer_scripts')

        <script src="{{ asset('assets/js/kelasabsen.js') }}" ></script>

@stop
