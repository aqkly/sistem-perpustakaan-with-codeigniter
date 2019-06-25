<p>
<button class="btn btn-success" data-toggle="modal" data-target="#Tambah">
    <i class="fa fa-plus"></i> Tambah  
</button>
</p>

<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Tambah Data Baru</h4>
</div>
<div class="modal-body">


<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//open form
echo form_open(base_url('admin/link'));
?>

<div class="col-md-12">
	<div class="form-group">
		<label>Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama" value="<?=set_value('nama_link') ?>" required>
	</div>

	<div class="form-group">
		<label>URL Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?= base_url() ?>" value="<?=set_value('url') ?>" required>
	</div>

	<div class="form-group">
		<label>Target</label>
		<select name="target" class="form-control">
			<option value="_blank">_blank</option>
			<option value="_self">_self</option>
			<option value="_parent">_parent</option>
			<option value="_top">_top</option>
		</select>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>

<div class="clearfix"></div>

</div>
<div class="modal-footer">
  
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
</div>
</div>
</div>
</div>