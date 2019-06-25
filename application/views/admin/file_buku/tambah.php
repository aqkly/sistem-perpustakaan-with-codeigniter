<p>
<button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-upload"></i> Upload File Baru  
</button>
</p>

<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//Kalo ada error Upload tampilkan
if(isset($error)) {
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

//open form
echo form_open_multipart(base_url('admin/file_buku/kelola/'.$buku->id_buku));
?>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah File Baru</h4>
</div>
<div class="modal-body">

<div class="form-group">
	<label>Judul File</label>
	<input type="text" name="judul_file" class="form-control" placeholder="Judul File" value="<?=set_value('judul_file')?>" required>
</div>
<div class="form-group">
	<label>Upload File</label>
	<input type="file" name="nama_file" class="form-control" placeholder="Upload File" value="<?=set_value('nama_file')?>" required>
</div>
<div class="form-group">
	<label>Urutan File</label>
	<input type="number" name="urutan" class="form-control" placeholder="Urutan File" value="<?=set_value('urutan')?>">
</div>
<div class="form-group">
	<label>Keterangan Lain</label>
	<textarea name="keterangan" class="form-control" placeholder="Keterangan Lain"><?=set_value('keterangan')?></textarea>
</div>

</div>
<div class="modal-footer">
    
    <input type="submit" name="submit" class="btn btn-success" value="Upload File Baru">

    <input type="reset" name="reset" class="btn btn-default" value="Reset">

    <button type="button" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>

<?php
//form close
echo form_close();
?>