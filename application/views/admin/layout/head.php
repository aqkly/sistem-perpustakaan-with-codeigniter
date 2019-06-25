<?php
//Konfigurasi
$konfigurasi = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title;?></title>
    <!-- Icon Dari Konfigurasi -->
    <link rel="shortcut icon" href="<?= base_url('assets/upload/image/'.$konfigurasi->icon) ?>">
	<!-- BOOTSTRAP STYLES-->
    <link href="<?=base_url()?>assets/admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?=base_url()?>assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="<?=base_url()?>assets/admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?=base_url()?>assets/admin/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- TNYMCE -->
    <script type="text/javascript" src="<?=base_url()?>assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '.editor',
            plugins: [
            'advlist autolink lists link image charmap print preview anchor textcolor',
            'searchreplace visualblocks code fullscreen',
            'insertdatetime media table contextmenu paste code'
            ],
            toolbar: 'insert | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | removeformat | help',
            content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css']
        });

    </script>
    <!-- JQUERY SCRIPTS -->
    <script src="<?=base_url(); ?>assets/admin/assets/js/jquery-1.10.2.js"></script>

    <!-- JQUERY UI -->
    <link href="<?= base_url() ?>assets/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url() ?>assets/jquery-ui/jquery-ui.min.js"></script>
    
    <!-- SELECT2 -->
    <link href="<?= base_url() ?>assets/select2/dist/css/select2.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url() ?>assets/select2/dist/js/select2.min.js"></script>

    <style type="text/css">
        select{
            color: #000 !important;
        }
    </style>
</head>
<body>
    <div id="wrapper">