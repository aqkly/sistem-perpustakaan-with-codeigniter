 <?php
//LOAD KONFIGURASI DI SEMUA HALAMAN WEB
$konfigurasi = $this->konfigurasi_model->listing();
?>

<!-- Site footer -->
    <footer class="footer">
      <p align="center">&copy; <?= date('Y') ?>, <?= $konfigurasi->namaweb ?> | Alamat: <?= $konfigurasi->alamat ?> | Telepon: <?= $konfigurasi->telepon ?></p>
    </footer>

  </div> <!-- /container -->
  <!-- JAVASCRIPT BOOTSTRAP -->
  <script type="text/javascript" src="<?=base_url()?>assets/perpus/js/bootstrap.min.js"></script>

  <script src="<?=base_url(); ?>assets/admin/assets/js/dataTables/jquery.dataTables.js"></script>
  <script src="<?=base_url(); ?>assets/admin/assets/js/dataTables/dataTables.bootstrap.js"></script>
<script>
	$(document).ready(function () {
	$('#dataTables-example').dataTable();
	});
</script>
</body>
</html>
