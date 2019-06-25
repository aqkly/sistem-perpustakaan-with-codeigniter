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
echo form_open_multipart(base_url('admin/berita/tambah'));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul Berita</label>
		<input type="text" name="judul_berita" class="form-control" placeholder="Judul Berita" value="<?=set_value('judul_berita') ?>" autofocus required>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Status Berita</label>
		<select name="status_berita" class="form-control">
			<option value="Publish">Publikasikan</option>
			<option value="Draft">Simpan Sebagai Draft</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Jenis Berita</label>
		<select name="jenis_berita" class="form-control">
			<option value="Berita">Berita</option>
			<option value="Slider">Homepage Slider</option>
		</select>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Upload Gambar</label>
		<input type="file" name="gambar" class="form-control" placeholder="Gambar" required>
	</div>
</div>

<div class="col-md-12">
	<div class="form-group">
		<label>Isi Berita</label>
		<textarea name="isi" class="form-control editor" placeholder="Isi Berita"><?=set_value('isi');?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>