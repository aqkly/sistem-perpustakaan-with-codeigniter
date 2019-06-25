     <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">

 <?php $i = 1; foreach($slider as $slider) { ?>       
        <div class="item <?php if($i==1) { echo "active"; } ?>">
          <img class="first-slide" src="<?=base_url('assets/upload/image/'.$slider->gambar) ?>" alt="<?=$slider->judul_berita ?>">
          <div class="container">
            <div class="carousel-caption">
              <h1 style="color:blue;font-weight:bold;"><?=$slider->judul_berita?></h1>
              <p><?= character_limiter($slider->isi,100) ?></p>
              <p><a class="btn btn-lg btn-primary" href="<?=base_url('berita/read/'.$slider->slug_berita)?>" role="button">Read More</a></p>
            </div>
          </div>
        </div>

<?php $i++; } ?>
        
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- /.carousel -->

      <!-- Example row of columns -->
      <div class="row">
      <div class="col-lg-7">
          <div class="panel panel-default">
          <div class="panel-body">
          <div class="row">
              <div class="col-md-4">
                <img src="<?=base_url('assets/upload/image/thumbs/'.$berita->gambar)?>" class="img img-responsive img-thumbnail">
              </div>
              <div class="col-md-8 posting">
                <h2><a href="<?=base_url('berita/read/'.$berita->slug_berita) ?>"><?= $berita->judul_berita ?></a></h2>
                <p><?= character_limiter($berita->isi,400) ?></p>
                <p class="text-right"><a href="<?=base_url('berita/read/'.$berita->slug_berita) ?>" class="btn btn-primary btn-sm" role="button">Baca Detail</a></p>
              </div>
          </div>
          </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">
              <h2>Pencarian Buku</h2>
              
              <p class="alert alert-success">
                <i class="glyphicon glyphicon-warning-sign"></i> Ketik Kata Kunci
              </p>

              <form action="<?= base_url('katalog') ?>" method="post" class="form-inline text-center"> 
                <input type="text" name="cari" class="form-control" placeholder="Kata Kunci" required>
                <input type="submit" name="submit" class="btn btn-success" value="Cari Buku">

              </form>
            </div>
          </div>

          <div class="panel panel-default">
            <div class="panel-body">
              <h2>Link Perpustakaan</h2>
             <ul>

              <?php foreach($link as $link) { ?>
               
              <li><a href="<?= $link->url ?>" title="<?= $link->nama_link ?>" target="<?= $link->target ?>">
                <?= $link->nama_link ?>
              </a></li>

              <?php } ?>

             </ul>
              
            </div>
          </div>
        </div>
    
        <div class="col-lg-5">
          <div class="panel panel-default">
            <div class="panel-body">
              <h2>Buku Baru</h2>

            <?php $a = 1; foreach ($buku as $buku) { ?>
            <!-- Buku 1 <?php echo $a ?> -->
             <div class="row buku">
              <div class="col-md-4">
                <a href="<?= base_url('katalog/read/'.$buku->id_buku) ?>">
                  <img class="img-thumbnail img-rounded" src="<?php if($buku->cover_buku == "") { echo base_url('assets/perpus/image/buku1.jpg'); }else { echo base_url('assets/upload/image/thumbs/'.$buku->cover_buku); } ?>" alt="<?= $buku->judul_buku ?>">
                </a>
              </div>
              <div class="col-md-8">
                <h4><a href="<?= base_url('katalog/read/'.$buku->id_buku) ?>"><?= $buku->judul_buku ?></a></h4>
                <p><?= character_limiter($buku->ringkasan,60) ?></p>
              </div>
              <div class="clearfix"></div>
              <hr />
            </div>
          <!-- End Buku 1 <?php echo $a ?> -->

          <?php $a++; } ?>

          <p>
            <a href="<?= base_url('katalog') ?>" class="btn btn-primary btn-block">
            <i class="glyphicon glyphicon-book"></i> Lihat Semua Koleksi</a>
          </p>
           
          </div>
        </div>
      </div>
    </div>
