<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">
  <h2><?=$title?></h2>

  <p class="text-right">
  	<a href="<?= base_url('katalog/read/'.$buku->id_buku) ?>" class="btn btn-success btn-block btn-lg">
  	<i class="glyphicon glyphicon-backward"></i> Kembali</a>
  </p>

  <iframe src="<?= base_url('assets/upload/files/'.$file_buku->nama_file) ?>" width="100%" height="800" allowfullscreen webkitallowfullscreen></iframe>

</div>
</div>

</div>
</div>