@extends('admin.layouts.default')

{{-- Page title --}}
@section('title')
    Dashboard
    @parent
@stop


{{-- page level styles --}}
@section('header_styles')

    <link rel="stylesheet" href="{{ asset('assets/css/pages/only_dashboard.css') }}"/>
    <meta name="_token" content="{{ csrf_token() }}">

@stop


{{-- Page content --}}
@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.3/socket.io.js"></script>


    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Send message</div>
                    <form method="POST" name="chatroom" enctype="multipart/form-data"
                              action="{{ route('kirimpesanchat') }}">
                              {{ csrf_field() }}                        
                        <input type="text" name="message" >
                        <input type="submit" value="send">
                    </form>
                </div>
            </div>
        </div>
    </section>


    
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
              <div id="messages" ></div>
            </div>
        </div>
    </div>

    <script>
        var socket = io.connect('http://ta.highker-service.web.id:8890');
        console.log("Test")
        socket.on('message', function (data) {

            $( "#messages" ).append( "<p>"+data+"</p>" );
        });
    </script>
        

@stop



{{-- page level scripts --}}
@section('footer_scripts')
  
    <!-- Back to Top-->
   
    <!-- <script src="{{ asset('assets/js/pages/todolist.js') }}"></script> -->
    <script src="{{ asset('assets/js/pages/dashboard.js') }}" type="text/javascript"></script>


@stop