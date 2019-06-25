<?php
//Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//Error Form
echo validation_errors('<div class="alert alert-warning">', '</div>');

//Form Open
echo form_open_multipart(base_url('admin/konfigurasi/logo'));
?>

<div class="col-md-4">

<?php if($konfigurasi->logo == "") { ?>
<div class="alert alert-success text-center">
	<i class="fa fa-warning"></i> Belum ada logo yang diupload
</div>

<?php } else { ?>
	
<img src="<?= base_url('assets/upload/image/'.$konfigurasi->logo) ?>" alt="<?= $konfigurasi->namaweb ?>" class="img img-responsive img-thumbnail">

<?php } ?>

</div>

<div class="col-md-8">

<input type="hidden" name="id_konfigurasi" value="<?= $konfigurasi->id_konfigurasi ?>">

<div class="form-group">
	<label>Upload Logo Baru</label>
	<input type="file" name="logo" class="form-control" required>
</div>

<div class="form-group">
	<button type="submit" name="submit" class="btn btn-success btn-lg">
	<i class="fa fa-upload"></i> Upload Logo
	</button>

	<button type="reset" name="reset" class="btn btn-default btn-lg">
	<i class="fa fa-times"></i> Reset
	</button>
</div>

</div>

<?php
//form close
echo form_close();
?>