@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Pilih Kelas Siswa
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
                <h1>Tambah Nilai</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="active">Pilih Kelas</li>
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
                                <form role="form" action="{{route ('gosavenilai') }}" method="POST">
                                    {{ csrf_field() }} 
                                <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 30px;">No</th>

                                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                             Full Name
                                            : activate to sort column ascending" style="width: 200px;">Nomor Induk</th>

                                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="
                                             Edit
                                            : activate to sort column ascending" style="width: 300px;">Nama</th>

                                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Delete : activate to sort column ascending" style="width: 50;">Kelas</th>
                                            <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" aria-label="Delete : activate to sort column ascending" style="width: 300px;">Nilai</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                        @foreach ($listsiswa as $siswa)
                                            @if ($loop->index % 2 )
                                                <tr role="row" class="even">
                                            @else 
                                                <tr role="row" class="odd">
                                            @endif
                                            
                                            <td class="sorting_1">{!! $loop->index+1 !!}</td>

                                            <td> {!! $siswa->username !!} <input hidden type="text" id="idsiswa" name="idsiswa[]" value="{!! $siswa->id !!}" ></input></td>
                                            <td> {!! $siswa->name !!}</td>
                                            <td> {!! $siswa->nama_kelas !!}</td>
                                            <td> <input type="number" id="daftarnilai" name="daftarnilai[]"> </input></td>
                                            
                                            </tr>
                                        @endforeach

                                
                                    </tbody>
                                </table>
                                <input hidden type="text" name="kodemapel" id="kodemapel" value="{{$kodemapel}}"> </input>

                                <label for="keterangan" >Keterangan : </label>
                                    <input name="keterangan" id="keterangan" type="text"></input>
                                    <button type="submit" class="btn btn-responsive btn-default" role="button">Simpan</button>
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
    
    </script>    
@stop