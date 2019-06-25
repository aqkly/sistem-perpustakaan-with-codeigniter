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
            <th>Nama</th>
            <th>URL</th>
            <th>Target</th>
            <th width="15%">Actions</th>
        </tr>
    </thead>
    <tbody>
    	<?php
    	$i = 1;
    	foreach ($link as $link) {
    	?>
        <tr>
            <td align="center"><?= $i++; ?></td>
            <td><?= $link->nama_link; ?></td>
            <td><?= $link->url; ?></td>
            <td><?= $link->target; ?></td>
            <td>
            	<a href="<?= base_url('admin/link/edit/'.$link->id_link); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>