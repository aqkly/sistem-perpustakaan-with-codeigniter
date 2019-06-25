<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">
  <h2><?=$title?></h2>

  <p class="text-right">
  	<a href="<?= base_url('katalog') ?>" class="btn btn-success btn-lg">
  	<i class="glyphicon glyphicon-search"></i> Pencarian Buku</a>
  </p>

  <table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Penerbit</th>
  <!--       <th>Jenis - Bahasa</th>
            <th>File</th> -->
            <th width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($buku as $buku) {
        $id_buku = $buku->id_buku;
        $file_buku = $this->file_buku_model->buku($id_buku);
    	?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td>
                <?php if($buku->cover_buku != "") { ?>
                <img src="<?= base_url('assets/upload/image/thumbs/'.$buku->cover_buku) ?>" class="img img-thumbnail" width="60">
                <?php } else{ echo "Tidak Ada"; } ?>
            </td>
            <td><?= $buku->judul_buku; ?></td>
            <td><?= $buku->penulis_buku; ?></td>
            <td><?= $buku->penerbit; ?></td>
           <!--  <td><?= $buku->kode_jenis; ?> - <?= $buku->kode_bahasa; ?></td>
            <td><?= count($file_buku) ?> file</td> -->
            <td>

            <a href="<?= base_url('katalog/read/'.$buku->id_buku); ?>" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-eye-open"></i> Baca</a>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>
</div>

</div>
</div>