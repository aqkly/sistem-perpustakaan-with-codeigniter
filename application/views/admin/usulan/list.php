<p><a href="<?=base_url('admin/usulan/tambah');?>" class="btn btn-success">
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
            <th>Nama Pengusul</th>
            <th>E-mail Pengusul</th>
            <th>Data Usulan</th>
            <th>Keterangan</th>
            <th>info</th>
            <th width="15%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($usulan as $usulan) {
    	?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $usulan->nama_pengusul; ?></td>
            <td><?= $usulan->email_pengusul; ?></td>
            <td><?= $usulan->judul; ?>
            <small>
                <br>Penulis: <?= $usulan->penulis ?>
                <br>Penerbit: <?= $usulan->penerbit ?>
                <br>Status Usulan: <?= $usulan->status_usulan ?>
            </small>
            </td>
            <td><?= $usulan->keterangan ?></td>
            <td>
            <small>
                Tanggal usulan: <?= date('d-m-Y H:i:s', strtotime($usulan->tanggal_usulan)) ?>
                <br>IP Address: <?= $usulan->ip_address ?>
            </small>
            </td>
            <td>
            	<a href="<?= base_url('admin/usulan/edit/'.$usulan->id_usulan); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>