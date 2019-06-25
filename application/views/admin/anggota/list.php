<p><a href="<?=base_url('admin/anggota/tambah');?>" class="btn btn-success">
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
            <th>Nama Anggota</th>
            <th>E-mail - Telepon</th>
            <th>Username - status</th>
            <th>Instansi</th>
            <th width="15%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($anggota as $anggota) {
    	?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td><?= $anggota->nama_anggota; ?></td>
            <td><?= $anggota->email; ?>
                <br><i class="fa fa-phone"></i> Telp:  <?= $anggota->telepon; ?>
            </td>
            <td><?= $anggota->username; ?> - <?= $anggota->status_anggota; ?></td>
            <td><?= $anggota->instansi; ?></td>
            <td>
            	<a href="<?= base_url('admin/anggota/edit/'.$anggota->id_anggota); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>