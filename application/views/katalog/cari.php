<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">
  <h2><?=$title?></h2>

  <p class="alert alert-success">Hasil Pencarian Dengan Kata Kunci: <strong><?= $keywords ?></strong></p>

<form action="<?= base_url('katalog') ?>" method="post" class="form-inline text-center"> 
  <input type="text" name="cari" class="form-control" placeholder="Kata Kunci Berdasarkan Judul" required>
  <input type="submit" name="submit" class="btn btn-success" value="Cari Buku">
</form>
<hr>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($buku as $buku) {
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
            <td>

            <a href="<?= base_url('katalog/read/'.$buku->id_buku); ?>" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> Lihat Detail</a>

            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

</div>
</div>

</div>
</div>