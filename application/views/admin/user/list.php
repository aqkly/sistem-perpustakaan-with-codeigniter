<p><a href="<?=base_url('admin/user/tambah');?>" class="btn btn-success">
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
            <th>Nama</th>
            <th>E-mail</th>
            <th>Username - level</th>
            <th>Keterangan</th>
            <th width="15%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($user as $user) {
    	?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td><?= $user->nama; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->username; ?> - <?= $user->akses_level; ?></td>
            <td><?= $user->keterangan; ?></td>
            <td>
            	<a href="<?= base_url('admin/user/edit/'.$user->id_user); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>