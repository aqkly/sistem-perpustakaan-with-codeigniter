<?php
//Deteksi uri segment
if($this->uri->segment(3) != "") {
    include('tambah.php');
} else{
?>

<p><a href="<?=base_url('admin/buku');?>" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah File Buku</a></p>

<?php } ?>

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
            <th>Judul File</th>
            <th>Nama File</th>
            <th>Keterangan</th>
            <th>Urutan</th>
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
            <td><?= $file_buku->judul_file; ?>
                <br><small>
                    Judul: <?= $file_buku->judul_buku ?>
                </small>
            </td>
            <td><?= $file_buku->nama_file; ?></td>
            <td><?= $file_buku->keterangan; ?></td>
            <td><?= $file_buku->urutan; ?></td>
            <td>

                 <a href="<?= base_url('admin/file_buku/unduh/'.$file_buku->id_file_buku); ?>" class="btn btn-success btn-xs" target="_blank"><i class="fa fa-download"></i> Unduh</a>

                <a href="<?= base_url('admin/file_buku/edit/'.$file_buku->id_file_buku); ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
          		
                <?php include('delete.php'); ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>