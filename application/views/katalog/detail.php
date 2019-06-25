<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">
  <h2><?=$title?></h2>

<div class="row">

	<p class="text-right">
		<a href="<?= base_url('katalog') ?>" class="btn btn-success">
		<i class="fa fa-backward"></i> Kembali dan cari buku lain
		</a>
	</p>
	<hr>
	
  <div class="col-md-4">
  	<?php if($buku->cover_buku != "") { ?>
  	<img src="<?= base_url('assets/upload/image/'.$buku->cover_buku) ?>" class="img img-thumbnail img-responsive">
  	<?php }else{ echo "Tidak Ada Cover"; } ?>
  </div>

<div class="col-md-8">

	<?php if(count($file_buku) < 1) { ?>
	<p class="alert alert-success text-center">
		<i class="glyphicon glyphicon-warning-sign"></i> File Buku tidak tersedia
	</p>

	<?php }else { ?>

	<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th>Judul File</th>
            <th>Keterangan</th>
            <th width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($file_buku as $file_buku) {
    	?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $file_buku->judul_file; ?></td>
            <td><?= $file_buku->keterangan; ?></td>
            <td>

             <a href="<?= base_url('katalog/baca/'.$file_buku->id_file_buku); ?>" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Baca</a>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

	<?php } ?>

	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th width="30%">Judul</th>
				<th>: <?= $buku->judul_buku ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Penulis</td>
				<td>: <?= $buku->penulis_buku ?></td>
			</tr>
			<tr>
				<td>Subjek Buku</td>
				<td>: <?= $buku->subyek_buku ?></td>
			</tr>
			<tr>
				<td>Jenis Buku</td>
				<td>: <?= $buku->nama_jenis ?></td>
			</tr>
			<tr>
				<td>Bahasa Buku</td>
				<td>: <?= $buku->nama_bahasa ?></td>
			</tr>
			<tr>
				<td>Letak Buku</td>
				<td>: <?= $buku->letak_buku ?></td>
			</tr>
			<tr>
				<td>Kode Buku</td>
				<td>: <?= $buku->kode_buku ?></td>
			</tr>
			<tr>
				<td>Kolasi</td>
				<td>: <?= $buku->kolasi ?></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>: <?= $buku->penerbit ?></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td>: <?= $buku->tahun_terbit ?></td>
			</tr>
			<tr>
				<td>Deskripsi</td>
				<td>: <?= $buku->ringkasan ?></td>
			</tr>
		</tbody>	
	</table>

</div>


</div>
</div>
</div>

</div>
</div>