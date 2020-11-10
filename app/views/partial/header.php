<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="<?php echo URL_ROOT; ?>/css/fonts/Merriweatherital.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/fontawesome/css/all.css">


  <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/AdministradorStyle.css"/>

  
  <title><?php echo isset($data['titulo']) ? $data['titulo'] : SITE_NAME ; ?></title>
</head>
<body>
<?php require APP_ROOT ."/views/partial/navbar.php"; ?>
<?php require APP_ROOT ."/views/partial/sidebar{$_SESSION['rol']}.php"; ?>