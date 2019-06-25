<?php
//LOAD KONFIGURASI DI SEMUA HALAMAN WEB
$konfigurasi = $this->konfigurasi_model->listing();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="<?= $title.', '. $konfigurasi->deskripsi ?>">
    <meta name="author" content="<?= $konfigurasi->namaweb.' - '.$konfigurasi->tagline ?>">
    <!-- KEYWORDS -->
    <meta name="keywords" conntent="<?= $title.', '. $konfigurasi->keywords ?>">
    <!-- ICON WEBSITE DIAMBIL DARI  DATABASE KONFIGURASI-->
    <link rel="shortcut icon" href="<?= base_url('assets/upload/image/'.$konfigurasi->icon) ?>">

    <title><?= $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/perpus/css/bootstrap.min.css" rel="stylesheet">

      <!-- FONTAWESOME STYLES-->
    <link href="<?=base_url()?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />

    <!-- TABLE STYLES-->
    <link href="<?=base_url()?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/perpus/css/style.css" rel="stylesheet">

    <!-- CAROUSEL -->
    <link href="<?= base_url() ?>assets/perpus/css/carousel.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- JAVASCRIPT JQUERY -->
    <script type="text/javascript" src="<?= base_url() ?>assets/jquery-ui/external/jquery/jquery.js"></script>

    <!-- VIEWERJS -->
    <script type="text/javascript" src="<?= base_url('assets/viewerjs/ViewerJS/pdf.js') ?>"></script>
  </head>

  <body>

    <div class="container">

