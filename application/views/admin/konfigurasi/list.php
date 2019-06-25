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
echo form_open(base_url('admin/konfigurasi'));
?>

<div class="col-md-6">

<div class="form-group">
	<label>Nama Perusahaan / Organisasi</label>
	<input type="text" name="namaweb" class="form-control" placeholder="Nama Perusahaan / Organisasi" value="<?= $konfigurasi->namaweb ?>" required>
</div>

<div class="form-group">
	<label>Tagline</label>
	<input type="text" name="tagline" class="form-control" placeholder="Tagline" value="<?= $konfigurasi->tagline ?>">
</div>

<div class="form-group">
	<label>Nomor Telepon Resmi</label>
	<input type="text" name="telepon" class="form-control" placeholder="Nomor Telepon Resmi" value="<?= $konfigurasi->telepon ?>">
</div>

<div class="form-group">
	<label>Email Resmi</label>
	<input type="email" name="email" class="form-control" placeholder="Email Resmi" value="<?= $konfigurasi->email ?>">
</div>

<div class="form-group">
	<label>Website</label>
	<input type="url" name="website" class="form-control" placeholder="<?= base_url() ?>" value="<?= $konfigurasi->website ?>">
</div>

<div class="form-group">
	<label>Facebook account (URL)</label>
	<input type="url" name="facebook" class="form-control" placeholder="http://facebook.com/akun" value="<?= $konfigurasi->facebook ?>">
</div>

<div class="form-group">
	<label>Instagram account (URL)</label>
	<input type="url" name="instagram" class="form-control" placeholder="http://instagram.com/akun" value="<?= $konfigurasi->instagram ?>">
</div>

<div class="form-group">
	<label>Twitter account (URL)</label>
	<input type="url" name="twitter" class="form-control" placeholder="http://twitter.com/akun" value="<?= $konfigurasi->twitter ?>">
</div>

<div class="alert alert-success">

<h2>Setting Peminjaman Buku</h2>
<hr>

<div class="form-group">
	<label>Maximal Peminjaman (Hari)</label>
	<input type="number" name="max_hari_peminjaman" class="form-control" placeholder="Maximal Peminjaman (Hari)" value="<?= $konfigurasi->max_hari_peminjaman ?>">
</div>

<div class="form-group">
	<label>Jumlah Maximal Peminjaman (Buku)</label>
	<input type="number" name="max_jumlah_peminjaman" class="form-control" placeholder="Jumlah Maximal Peminjaman (Buku)" value="<?= $konfigurasi->max_jumlah_peminjaman ?>">
</div>

<div class="form-group">
	<label>Denda Keterlambatan Perhari (Rp)</label>
	<input type="number" name="denda_perhari" class="form-control" placeholder="Denda Keterlambatan Perhari (Rp)" value="<?= $konfigurasi->denda_perhari ?>">
</div>

</div>

</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Alamat Perusahaan / Organisasi</label>
		<textarea name="alamat" placeholder="Alamat Perusahaan / Organisasi" class="form-control"><?= $konfigurasi->alamat ?></textarea>
	</div>

	<div class="form-group">
		<label>Deskripsi Perusahaan / Organisasi</label>
		<textarea name="deskripsi" placeholder="Deskripsi Perusahaan / Organisasi" class="form-control"><?= $konfigurasi->deskripsi ?></textarea>
	</div>

	<div class="form-group">
		<label>Keywords Website (Untuk SEO Google)</label>
		<textarea name="keywords" placeholder="Keywords Website (Untuk SEO Google)" class="form-control"><?= $konfigurasi->keywords ?></textarea>
	</div>

	<div class="form-group">
		<label>Kode Google Map (Pilih format iframe)</label>
		<textarea name="map" placeholder="Kode Google Map (Pilih format iframe)" class="form-control"><?= $konfigurasi->map ?></textarea>
	</div>

	<div class="form-group">
		<label>MetaText (Biasanya dari Google Analystics &map; Webmaster)</label>
		<textarea name="metatext" placeholder="MetaText (Biasanya dari Google Analystics &maps; Webmaster" class="form-control"><?= $konfigurasi->metatext ?></textarea>
	</div>

	<h4>Google Map</h4>
	<hr>
	<style type="text/css" media="screen">
		iframe {
			width:100%;
			height:auto;
			min-height: 300px;
		}
	</style>
	<?= $konfigurasi->map ?>
	<hr>

	<div class="form-group">
		<button type="submit" name="submit" class="btn btn-success btn-lg">
		<i class="fa fa-save"></i> Simpan Konfigurasi
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