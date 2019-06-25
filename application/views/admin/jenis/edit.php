<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//open form
echo form_open(base_url('admin/jenis/edit/'.$jenis->id_jenis));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Jenis  Buku</label>
		<input type="text" name="nama_jenis" class="form-control" placeholder="Nama Jenis Buku" value="<?=$jenis->nama_jenis; ?>" required>
	</div>
	<div class="form-group">
		<label>kode Jenis Buku</label>
		<input type="text" name="kode_jenis" class="form-control" placeholder="Kode Jenis Buku" value="<?=$jenis->kode_jenis; ?>" required>
	</div>
	<div class="form-group">
		<label>Urutan</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?=$jenis->urutan; ?>" required>
	</div>
</div>

<div class="col-md-6">
	
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control"><?= $jenis->keterangan; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Update">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>