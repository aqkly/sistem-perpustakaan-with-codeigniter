<style type="text/css">
	iframe{
		width:100%;
		height:auto;
		max-height: 400px;
	}
</style>

<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">
  <h2><?=$title?></h2>

  <div class="row">
  	<div class="col-md-6">
  		<p>
  			<strong><?= $konfigurasi->namaweb ?></strong>
  			<br><?= nl2br($konfigurasi->alamat) ?>
  			<br><i class="fa fa-phone"></i> <?= $konfigurasi->telepon ?>
  			<br><i class="fa fa-envelope"></i> <?= $konfigurasi->email ?>
  			<br><i class="fa fa-globe"></i> <?= str_replace('http://','www.',$konfigurasi->website) ?>
  		</p>
  	</div>
  	<div class="col-md-6">
  		<?= $konfigurasi->map ?>
  	</div>
  </div>

</div>
</div>

</div>
</div>