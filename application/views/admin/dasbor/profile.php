<?php
//Notifikasi Input Error
echo validation_errors('<div class="alert alert-danger"><i class="fa fa-warning"></i> ', '</div>');

//Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}

//open form
echo form_open(base_url('admin/dasbor/profile/'));
?>

<div class="col-md-6">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$user->nama; ?>" required>
	</div>
	<div class="form-group">
		<label>E-mail</label>
		<input type="email" name="email" class="form-control" placeholder="E-mail" value="<?=$user->email; ?>" required>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?= $user->username; ?>" required readonly disabled>
	</div>
	<div class="form-group">
		<label>Password</label><span class="text-danger"><small> (Password minimal 6 karakter atau biarkan kosong)</small></span>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?=set_value('password') ?>">
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Level Hak Akses</label>
		<select name="akses_level" class="form-control">
			<option value="<?=$user->akses_level;?>"><?=$user->akses_level;?></option>
		</select>
	</div>

	<div class="form-group">
		<label>Keterangan</label>
		<textarea name="keterangan" class="form-control"><?= $user->keterangan; ?></textarea>
	</div>

	<div class="form-group">
		<input type="submit" name="submit" class="btn btn-success btn-md" value="Update">
		<input type="reset" name="reset" class="btn btn-default btn-md" value="Reset">
	</div>
</div>

<?php
echo form_close();
?>