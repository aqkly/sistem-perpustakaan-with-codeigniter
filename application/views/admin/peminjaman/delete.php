<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?=$peminjaman->id_peminjaman;?>">
    <i class="fa fa-trash-o"></i> Hapus  
</button>
<div class="modal fade" id="Delete<?=$peminjaman->id_peminjaman;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Hapus Data Peminjaman</h4>
</div>
<div class="modal-body">
      <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin Ingin Hapus Data Ini ?</p>         
</div>
<div class="modal-footer">
    <a href="<?= base_url('admin/peminjaman/delete/'.$peminjaman->id_peminjaman); ?>" class="btn btn-danger">
    <i class="fa fa-trash-o"></i> Hapus</a>

    <a href="<?= base_url('admin/peminjaman/edit/'.$peminjaman->id_peminjaman); ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>

    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>