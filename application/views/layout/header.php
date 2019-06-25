<?php
//LOAD KONFIGURASI DI SEMUA HALAMAN WEB
$konfigurasi = $this->konfigurasi_model->listing();
?>

 <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
<div class="masthead">
<div class="header">

	<div class="col-md-2">
		<a href="<?= base_url() ?>" title="<?= $konfigurasi->namaweb ?>">
			<img src="<?= base_url('assets/upload/image/'.$konfigurasi->logo) ?>" class="img img-responsive img-thumbnail" alt="<?= $konfigurasi->namaweb ?>">
		</a>  
	</div>
	<div class="col-md-5">
		<h1 class="text-muted"><?= $konfigurasi->namaweb ?></h1>
		<h3 class="text-muted"><?= $konfigurasi->tagline ?></h3>
	</div>

	<div class="col-md-5 text-right">
		<p>
			<a href="<?= $konfigurasi->facebook ?>" target="_blank" class="btn">
			<i class="fa fa-facebook fa-2x"></i> Facebook
			</a>

			<a href="<?= $konfigurasi->twitter ?>" target="_blank" class="btn">
			<i class="fa fa-twitter fa-2x"></i> Twitter
			</a>

			<a href="<?= $konfigurasi->instagram  ?>" target="_blank" class="btn">
			<i class="fa fa-instagram fa-2x"></i> Instagram
			</a>
		</p>
	</div>
	<div class="clearfix"></div>

</div>
