<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

	<?php
        helpers\assets::css(array(
            helpers\url::template_path() . 'assets/css/bootstrap.min.css',
            helpers\url::template_path() . 'assets/css/dashboard.css',
        ))
        ?>
  </head>
  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project Score</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/logout">Uitloggen</a></li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
              <li <?php if($data['title'] === 'Dashboard'): ?>class="active"<?php endif; ?>><a href="<?php echo DIR; ?>dashboard">Dashboard</a></li>
              <li <?php if($data['title'] === 'Tentamens'): ?>class="active"<?php endif; ?>><a href="<?php echo DIR; ?>tentamens">Tentamens</a></li>
              <li><a href="#">Menu item</a></li>
              <li><a href="#">Menu item</a></li>
            </ul>
          </div>
          <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h1 class="page-header"><?php echo $data['title']; ?> <?php if(isset($data['subtitle'])): ?><small>- <?php echo $data['subtitle']; ?></small><?php endif; ?></h1>