<?php
// Dapatkan id user yang didaftarkan saat login
$id_user 	= $this->session->userdata('id_user');
$user_aktif = $this->user_model->detail($id_user);
//Konfigurasi
$konfigurasi = $this->konfigurasi_model->listing();
?>

<style type="text/css">
	.navbar-brand {
		font-size:18px !important;
	}
</style>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?=base_url('admin/dasbor');?>">
			<?= $konfigurasi->namaweb ?>
		</a> 
	</div>

	<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <?= date('d M Y'); ?> &nbsp; 
		<a href="<?= base_url('admin/dasbor/profile'); ?>" class="btn btn-success square-btn-adjust"><i class="fa fa-sign-user"></i> <?=$user_aktif->nama;?> (<?=$user_aktif->akses_level;?>)</a> 

		<a href="<?= base_url(); ?>" class="btn btn-primary square-btn-adjust" target="_blank"><i class="fa fa-home"></i> HomePage</a> 

		<a href="<?= base_url('login/logout'); ?>" class="btn btn-danger square-btn-adjust"><i class="fa fa-sign-out"></i> Logout</a> 
	</div>
</nav>   
<!-- /. NAV TOP  -->