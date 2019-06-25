<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#Delete<?=$file_buku->id_file_buku;?>"> Hapus
    <i class="fa fa-trash-o"></i>  
</button>
<div class="modal fade" id="Delete<?=$file_buku->id_file_buku;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Hapus Data File Buku : <?=$file_buku->judul_buku;?></h4>
</div>
<div class="modal-body">
      <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin Ingin Hapus Data Ini ?</p>         
</div>
<div class="modal-footer">
    <a href="<?= base_url('admin/file_buku/delete/'.$file_buku->id_file_buku.'/'.$file_buku->id_buku); ?>" class="btn btn-danger">
    <i class="fa fa-trash-o"></i> Hapus</a>

    <a href="<?= base_url('admin/file_buku/edit/'.$file_buku->id_file_buku); ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>

    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>