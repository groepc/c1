<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $data['title'].' - '.SITETITLE; //SITETITLE defined in app/core/config.php ?></title>

    <link href="app/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="app/assets/css/login.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
        <form class="form-signin" action="/" method="post">
            <h2 class="form-signin-heading">Project Score - Docenten</h2>
            <?php echo \core\error::display($error); ?>
            <label for="username" class="sr-only">Gebruikersnaam</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Gebruikersnaam" required autofocus>
            <label for="password" class="sr-only">Wachtwoord</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Wachtwoord" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
        </form>
    </div>
    <!-- JS -->
    <?php helpers\assets::js(helpers\url::template_path() . 'js/jquery.js') ?>
</body>
</html>