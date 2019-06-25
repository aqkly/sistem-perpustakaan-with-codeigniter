<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//open form
echo form_open(base_url('admin/link/edit/'.$link->id_link));
?>

<div class="col-md-12">
	<div class="form-group">
		<label>Nama Link</label>
		<input type="text" name="nama_link" class="form-control" placeholder="Nama" value="<?= $link->nama_link ?>" required>
	</div>

	<div class="form-group">
		<label>URL Website</label>
		<input type="url" name="url" class="form-control" placeholder="<?= base_url() ?>" value="<?= $link->url ?>" required>
	</div>

	<div class="form-group">
		<label>Target</label>
		<select name="target" class="form-control">
			<option value="_blank">_blank</option>
			<option value="_self" <?php if($link->target == "_self"){ echo "selected"; } ?>>_self</option>
			<option value="_parent" <?php if($link->target == "_parent"){ echo "selected"; } ?>>_parent</option>
			<option value="_top" <?php if($link->target == "_top"){ echo "selected"; } ?>>_top</option>
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