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
echo form_open_multipart(base_url('admin/buku/tambah'));
?>

<div class="col-md-12">
	<div class="form-group form-group-lg">
		<label>Judul Buku</label>
		<input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" value="<?=set_value('judul_buku') ?>" autofocus required>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Penulis Buku / Pengarang Buku</label>
		<input type="text" name="penulis_buku" class="form-control" placeholder="Penulis Buku" value="<?=set_value('penulis_buku') ?>" required>
	</div>
	<div class="form-group">
		<label>Kode Buku </label>
		<input type="text" name="kode_buku" class="form-control" placeholder="Kode Buku" value="<?=set_value('kode_buku') ?>">
	</div>
	<div class="form-group">
		<label>Nomor Seri Buku </label>
		<input type="text" name="nomor_seri" class="form-control" placeholder="Nomor Seri Buku" value="<?=set_value('nomor_seri') ?>">
	</div>
	<div class="form-group">
		<label>Jenis Buku</label>
		<select name="id_jenis" class="form-control">
			<?php foreach ($jenis as $jenis) { ?>
			<option value="<?= $jenis->id_jenis ?>">
				<?= $jenis->kode_jenis ?> - <?= $jenis->nama_jenis ?>	
			</option>
			<?php } ?>

		</select>
	</div>
	<div class="form-group">
		<label>Bahasa Buku</label>
		<select name="id_bahasa" class="form-control">
			<?php foreach ($bahasa as $bahasa) { ?>
			<option value="<?= $bahasa->id_bahasa ?>">
				<?= $bahasa->kode_bahasa ?> - <?= $bahasa->nama_bahasa ?>	
			</option>
			<?php } ?>

		</select>
	</div>
	
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Kolasi Buku </label>
		<input type="number" name="kolasi" class="form-control" placeholder="Kolasi Buku" value="<?=set_value('kolasi') ?>">
	</div>
	<div class="form-group">
		<label>Penerbit Buku </label>
		<input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" value="<?=set_value('penerbit') ?>">
	</div>
	<div class="form-group">
		<label>Tahun Terbit Buku </label>
		<input type="number" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit Buku" value="<?=set_value('tahun_terbit') ?>">
	</div>
	<div class="form-group">
		<label>Status Buku</label>
		<select name="status_buku" class="form-control">
			<option value="Publish">Publish</option>
			<option value="Not Publish">Not Publish</option>
			<option value="Missing">Missing</option>
		</select>
	</div>

	<div class="form-group">
		<label>Keterangan Lain / Ringkasan</label>
		<textarea name="ringkasan" class="form-control" placeholder="Keterangan Lain / Ringkasan"><?= set_value('ringkasan'); ?></textarea>
	</div>
</div>

<div class="col-md-4">
	<div class="form-group">
		<label>Subyek Buku</label>
		<input type="text" name="subyek_buku" class="form-control" placeholder="Subyek Buku" value="<?=set_value('subyek_buku') ?>">
	</div>
	<div class="form-group">
		<label>Letak Buku </label>
		<input type="text" name="letak_buku" class="form-control" placeholder="Letak Buku" value="<?=set_value('letak_buku') ?>">
	</div>
	<div class="form-group">
		<label>Jumlah Buku </label>
		<input type="number" name="jumlah_buku" class="form-control" placeholder="Jumlah Buku" value="<?=set_value('jumlah_buku') ?>">
	</div>
	<div class="form-group">
		<label>Upload Cover / Gambar Buku </label>
		<input type="file" name="cover_buku" class="form-control" placeholder="cover Buku" value="<?=set_value('cover_buku') ?>">
	</div>
</div>
<div class="col-md-12 text-center">
	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>