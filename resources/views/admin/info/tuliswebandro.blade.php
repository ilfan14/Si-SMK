@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
Dashboard
@parent
@stop


{{-- page level styles --}}
@section('header_styles')

<link href="{{ asset('assets/vendors/fullcalendar/css/fullcalendar.css') }}" rel="stylesheet" type="text/css"/>
<link href="{{ asset('assets/css/pages/calendar_custom.css') }}" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" media="all" href="{{ asset('assets/vendors/bower-jvectormap/css/jquery-jvectormap-1.2.2.css') }}"/>
<link rel="stylesheet" href="{{ asset('assets/vendors/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
<meta name="_token" content="{{ csrf_token() }}">
<link rel="stylesheet" type="text/css"
href="{{ asset('assets/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css') }}">

@stop


{{-- Page content --}}
@section('content')

@role(['Siswa'])
<section class="content-header">
    <h1>Selamat Datang di Beranda Informasi</h1>

</section>

<section>
    <div style="text-align: center; font-size: xx-large;">Belum Ada informasi</div>
</section>

@endrole

@role(['Guru', 'Admin'])

<section class="content-header">
    <h1>Selamat Datang di Informasi</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
</section>

<section>
    <div class="row">
        <form method="POST" id="SatuNomor" name="FormTulisInfo" onsubmit="return Validation()" enctype="multipart/form-data" action="{{ route('kiriminfo') }}">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="txtNotujuan" class="control-label">Judul</label>
                        <input type="text" name="ijudul" id="ijudul" class="form-control input-md">
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="txtIsiPesan" class="control-label">Isi informasi</label>

                        <textarea id="isiinformasi" name="isiinformasi" class="form-control input-md"></textarea>
                        <div id="jumlahcharsatu"></div>
                    </div>
                </div>
                 <div class="col-xs-12">
                    <div class="form-group">
                    <label for="txtTipeSMS" class="control-label">Di tujukan ke : </label>

                        <select id="ditujukan" name="ditujukan" class="form-control select2">
                            <option value="Publik">Publik</option>
                            <option value="Pengguna">Pengguna</option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-6 col-md-6">
                    <input type="submit" name="btnSubmit" id="btnSubmit" value="Kirim"
                    class="btn btn-primary btn-block btn-md btn-responsive">
                </div>
                <div class="col-xs-6 col-md-6">
                    <input type="reset" value="Batal"
                    class="btn btn-success btn-block btn-md btn-responsive">
                </div>

            </div>

        </form>
    </div>




</section>


@endrole

@stop



{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/vendors/moment/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

<!--   maps -->
<script src="{{ asset('assets/js/pages/validationinfo.js') }}"></script>

<script type="text/javascript">
        // clear daftar

        

    </script>



    @stop