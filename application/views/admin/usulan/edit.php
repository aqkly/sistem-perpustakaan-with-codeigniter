<p class="alert alert-success">Anda dapat mengusulkan judul koleksi buku terbaru melalui formulir ini. Silahkan masukan data-data Anda dengan lengkap</p>

  <?php
  //echo validation error
  echo validation_errors('<div class="alert alert-warning">', '</div>');

  //Buku form
  echo form_open(base_url('admin/usulan/edit/'.$usulan->id_usulan));
  ?>

  <div class="form-group">
    <div class="col-md-3 text-right">Judul Buku Baru<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="judul" class="form-control" placeholder="Judul Buku Baru" value="<?= $usulan->judul ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Nama Penulis / Pengarang<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis / Pengarang" value="<?= $usulan->penulis ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Nama Penerbit<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit" value="<?= $usulan->penerbit ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Keterangan Lain<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
       <textarea class="form-control" name="keterangan" placeholder="Keterangan Lain"><?= $usulan->keterangan ?></textarea>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Nama Pengusul<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="nama_pengusul" class="form-control" placeholder="Nama Pengusul" value="<?= $usulan->nama_pengusul ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">E-mail Pengusul<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="email" name="email_pengusul" class="form-control" placeholder="E-mail Pengusul" value="<?= $usulan->email_pengusul ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Status Usulan<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <select name="status_usulan" class="form-control">
          <option value="Diterima">Diterima</option>
          <option value="Baru" <?php if($usulan->status_usulan == "Baru") { echo "selected"; } ?>>Baru</option>
          <option value="Pending" <?php if($usulan->status_usulan == "Pending") { echo "selected"; } ?>>Pending</option>
          <option value="Ditolak" <?php if($usulan->status_usulan == "Ditolak") { echo "selected"; } ?>>Ditolak</option>
        </select>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right"><span class="text-danger"></span></div>
    <div class="col-md-9 text-left">
        <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Kirim Usulan">
        <input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
    </div> 
  </div>


  <?php
  //form close
  echo form_close();
  ?>