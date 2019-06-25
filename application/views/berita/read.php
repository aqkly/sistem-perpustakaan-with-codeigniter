<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-default">
  <div class="panel-body">
  <div class="row">
     
      <div class="col-md-8 posting">

        <h2 align="center"><?= $berita->judul_berita ?></h2>
        <p><img src="<?=base_url('assets/upload/image/'.$berita->gambar)?>" class="img img-responsive img-thumbnail"></p><br>
        <?= $berita->isi ?>

      </div>

       <div class="col-md-4 lain">
        <h2>Berita Lainya</h2>
        <ul>
        <?php foreach($berita_lain as $berita_lain) { ?>

        <li><a href="<?=base_url('berita/read/'.$berita_lain->slug_berita) ?>">
        <?=$berita_lain->judul_berita ?></li>

        <?php } ?>
        </ul>
      </div>
  </div>
  </div>
  </div>