<!-- Example row of columns -->
<div class="row">
<div class="col-lg-12">
  <div class="panel panel-default">
  <div class="panel-body">
  <div class="row">
      <div class="col-md-4">
        <img src="<?=base_url('assets/upload/image/thumbs/'.$berita->gambar)?>" class="img img-responsive img-thumbnail">
      </div>
      <div class="col-md-8 posting">
        <h2><a href="<?=base_url('berita/read/'.$berita->slug_berita) ?>"><?= $berita->judul_berita ?></a></h2>
        <p><?= character_limiter($berita->isi,250) ?></p>
        <p class="text-right"><a href="<?=base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-primary btn-sm" role="button">Baca Detail</a></p>
      </div>
  </div>
  </div>
  </div>