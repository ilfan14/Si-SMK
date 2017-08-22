<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title" id="user_delete_confirm_title">Konfirmasi Penghapusan {{$model}}</h4>
</div>
<div class="modal-body">
    @if($error)
        <div>{!! $error !!}</div>
    @else
        Apakah Anda yakin ingin menghapus data : {{$info->judul}} ?
    @endif
</div>
<div class="modal-footer">
  <form action="{{ $confirm_route }}" method="post" >
    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>

    @if(!$error)
      <input type="submit" class="btn btn-danger" name="submit" value="Hapus"></input>
    @endif

    {{ method_field('DELETE') }}
    {{ csrf_field() }}

  </form> 
  
</div>
