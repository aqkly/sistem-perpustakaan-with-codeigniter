<div class="row">
<div class="col-lg-12">

<div class="panel panel-default">
<div class="panel-body">
  <h2><?=$title?></h2>

  <?php if($this->session->flashdata('sukses')) { ?>

  <div class="alert alert-success text-center">
    <?= $this->session->flashdata('sukses'); ?>
  </div>

  <?php } else{ ?>

  <p class="alert alert-success">Anda dapat mengusulkan judul koleksi buku terbaru melalui formulir ini. Silahkan masukan data-data Anda dengan lengkap</p>

  <?php
  //echo validation error
  echo validation_errors('<div class="alert alert-warning">', '</div>');

  //Buku form
  echo form_open(base_url('usulan'));
  ?>

  <div class="form-group">
    <div class="col-md-3 text-right">Judul Buku Baru<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="judul" class="form-control" placeholder="Judul Buku Baru" value="<?= set_value('judul') ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Nama Penulis / Pengarang<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="penulis" class="form-control" placeholder="Nama Penulis / Pengarang" value="<?= set_value('penulis') ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Nama Penerbit<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="penerbit" class="form-control" placeholder="Nama Penerbit" value="<?= set_value('penerbit') ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Keterangan Lain<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
       <textarea class="form-control" name="keterangan" placeholder="Keterangan Lain"><?= set_value('keterangan') ?></textarea>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">Nama Pengusul<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="text" name="nama_pengusul" class="form-control" placeholder="Nama Pengusul" value="<?= set_value('nama_pengusul') ?>" required>
    </div> 
  </div>

  <div class="col-md-12"><hr></div>
  <div class="form-group">
    <div class="col-md-3 text-right">E-mail Pengusul<span class="text-danger">*</span></div>
    <div class="col-md-9 text-left">
        <input type="email" name="email_pengusul" class="form-control" placeholder="E-mail Pengusul" value="<?= set_value('email_pengusul') ?>" required>
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

    } //end if flashdata
  ?>

</div>
</div>

</div>
</div>