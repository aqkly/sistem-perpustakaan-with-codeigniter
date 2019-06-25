<?php include("tambah.php"); ?>

<br>

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
            <th>Kode</th>
            <th>Nama</th>
            <th>Urutan</th>
            <th>Keterangan</th>
            <th width="15%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($bahasa as $bahasa) {
    	?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td><?= $bahasa->kode_bahasa; ?></td>
            <td><?= $bahasa->nama_bahasa; ?></td>
            <td><?= $bahasa->urutan; ?></td>
            <td><?= $bahasa->keterangan; ?></td>
            <td>
            	<a href="<?= base_url('admin/bahasa/edit/'.$bahasa->id_bahasa); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>