<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo URL_ROOT; ?>/css/fonts/Merriweatherital.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo URL_ROOT; ?>/img/favicon.ico">
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/bootstrap.min.css" />
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/EstilosGeneral.css" />
    <!-- Check CSS Datatables -->
  <?php
  if (isset($data['dataTables'])) {
    require_once APP_ROOT . "/views/partial/css/cssDataTables.php";
  }
  ?>
  <title><?php echo isset($data['titulo']) ? $data['titulo'] : SITE_NAME; ?></title>
</head>
<body>