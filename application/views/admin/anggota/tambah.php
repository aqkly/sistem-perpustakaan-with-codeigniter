<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//open form
echo form_open(base_url('admin/anggota/tambah'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama Anggota</label>
		<input type="text" name="nama_anggota" class="form-control" placeholder="Nama Anggota" value="<?=set_value('nama_anggota') ?>" required>
	</div>
	<div class="form-group">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control" placeholder="E-mail" value="<?=set_value('email') ?>" required>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?=set_value('username') ?>" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?=set_value('password') ?>" required>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Telepon / HP</label>
		<input type="text" name="telepon" class="form-control" placeholder="Telepon / HP" value="<?=set_value('telepon') ?>" required>
	</div>
	<div class="form-group">
		<label>Status Anggota</label>
		<select name="status_anggota" class="form-control">
			<option value="Active">Active</option>
			<option value="Non Active">Non Active</option>
		</select>
	</div>

	<div class="form-group">
		<label>Nama Instansi</label>
		<textarea name="instansi" class="form-control" placeholder="Instansi"><?= set_value('instansi'); ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Simpan">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>