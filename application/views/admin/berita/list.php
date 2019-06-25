<p><a href="<?=base_url('admin/berita/tambah');?>" class="btn btn-success">
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
            <th>Gambar</th>
            <th>Judul Berita</th>
            <th>Status</th>
            <th>Jenis</th>
            <th>Tanggal</th>
            <th width="20%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($berita as $berita) {
    	?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td>
                <?php if($berita->gambar != "") { ?>
                <img src="<?= base_url('assets/upload/image/thumbs/'.$berita->gambar) ?>" class="img img-thumbnail" width="60">
                <?php } else{ echo "Tidak Ada"; } ?>
            </td>
            <td><?= $berita->judul_berita; ?></td>
            <td><?= $berita->status_berita; ?></td>
            <td><?= $berita->jenis_berita; ?></td>
            <td><?= date('d-m-Y H:i:s',strtotime($berita->tanggal)); ?></td>
            <td>

            	<a href="<?= base_url('admin/berita/edit/'.$berita->id_berita); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>