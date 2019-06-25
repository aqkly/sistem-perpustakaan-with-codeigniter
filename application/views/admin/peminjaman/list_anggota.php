<p class="alert alert-success">
    <i class="fa fa-warning"></i> Cari Nama Anggota di kolom <strong>search</strong>, Kemudian klik tombol <strong><i class="fa fa-plus"></i> Peminjaman Buku</strong>
</p>


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

        	<a href="<?= base_url('admin/peminjaman/add/'.$anggota->id_anggota); ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Peminjaman Buku</a>
      	
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>