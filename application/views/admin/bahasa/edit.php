<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//open form
echo form_open(base_url('admin/bahasa/edit/'.$bahasa->id_bahasa));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Bahasa  Buku</label>
		<input type="text" name="nama_bahasa" class="form-control" placeholder="Nama Bahasa Buku" value="<?=$bahasa->nama_bahasa; ?>" required>
	</div>
	<div class="form-group">
		<label>kode Bahasa Buku</label>
		<input type="text" name="kode_bahasa" class="form-control" placeholder="Kode Bahasa Buku" value="<?=$bahasa->kode_bahasa; ?>" required>
	</div>
	<div class="form-group">
		<label>Urutan</label>
		<input type="number" name="urutan" class="form-control" placeholder="Urutan" value="<?=$bahasa->urutan; ?>" required>
	</div>
</div>

<div class="col-md-6">
	
	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control"><?= $bahasa->keterangan; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Update">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>