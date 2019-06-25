<p><a href="<?=base_url('admin/buku/tambah');?>" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah</a></p>

<?php
//Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Letak Buku</th>
            <th>Jenis - Bahasa</th>
            <th>File</th>
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
            <td><?= $buku->letak_buku; ?></td>
            <td><?= $buku->kode_jenis; ?> - <?= $buku->kode_bahasa; ?></td>
            <td><?= count($file_buku) ?> file</td>
            <td>

                <a href="<?= base_url('admin/file_buku/kelola/'.$buku->id_buku); ?>" class="btn btn-info btn-xs"><i class="fa fa-book"></i> Kelola File</a>

                <?php include("detail.php"); ?>

            	<a href="<?= base_url('admin/buku/edit/'.$buku->id_buku); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>