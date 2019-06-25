<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#Detail<?=$buku->id_buku;?>">
    <i class="fa fa-eye"></i>  
</button>
<div class="modal fade" id="Detail<?=$buku->id_buku;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Detail Data Buku : <?=$buku->judul_buku;?></h4>
</div>
<div class="modal-body">
     
	<table class="table table-bordered table-striped"> 
		<thead>
			<tr>
				<th width="30%">Judul Buku</th>
				<th>: <?= $buku->judul_buku; ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Penulis</td>
				<td>: <?= $buku->penulis_buku; ?></td>
			</tr>
			<tr>
				<td>Jenis Buku</td>
				<td>: <?= $buku->nama_jenis; ?></td>
			</tr>
			<tr>
				<td>Bahasa</td>
				<td>: <?= $buku->nama_bahasa; ?></td>
			</tr>
			<tr>
				<td>Nomor Seri</td>
				<td>: <?= $buku->nomor_seri; ?></td>
			</tr>
			<tr>
				<td>Kode Buku</td>
				<td>: <?= $buku->kode_buku; ?></td>
			</tr>
			<tr>
				<td>Letak Buku</td>
				<td>: <?= $buku->letak_buku; ?></td>
			</tr>
			<tr>
				<td>Kolasi</td>
				<td>: <?= $buku->kolasi; ?></td>
			</tr>
			<tr>
				<td>Penerbit</td>
				<td>: <?= $buku->penerbit; ?></td>
			</tr>
			<tr>
				<td>Tahun Terbit</td>
				<td>: <?= $buku->tahun_terbit; ?></td>
			</tr>
			<tr>
				<td>Subyek Buku</td>
				<td>: <?= $buku->subyek_buku; ?></td>
			</tr>
			<tr>
				<td>Status Buku</td>
				<td>: <?= $buku->status_buku; ?></td>
			</tr>
			<tr>
				<td>Ringkasan</td>
				<td>: <?= $buku->ringkasan; ?></td>
			</tr>
			<tr>
				<td>Jumlah Buku</td>
				<td>: <?= $buku->jumlah_buku; ?></td>
			</tr>
			<tr>
				<td>Tanggal Entri</td>
				<td>: <?= date('d-m-Y H:i:s', strtotime($buku->tanggal_entri)); ?></td>
			</tr>
			<tr>
				<td>Tanggal Update</td>
				<td>: <?= date('d-m-Y H:i:s', strtotime($buku->tanggal)); ?></td>
			</tr>
		
		</tbody>
	</table>

</div>
<div class="modal-footer">
    <a href="<?= base_url('admin/buku/delete/'.$buku->id_buku); ?>" class="btn btn-danger">
    <i class="fa fa-trash-o"></i> Hapus</a>

    <a href="<?= base_url('admin/buku/edit/'.$buku->id_buku); ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>

    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-times"></i>Close</button>
</div>
</div>
</div>
</div>