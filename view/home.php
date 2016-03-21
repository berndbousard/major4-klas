<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Klassiekers in je klas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>
<body>
    <?php
      echo "<pre>";
      echo var_dump($errors);
      echo "</pre>";
    ?>
    <div class="container form-temp">
      <h1>Dit is om deel te nemen</h1>
      <form action="/" method="POST">
        <label for="name">Docent naam &amp; familienaam</label>
        <input type="text" name="name" id="name" placeholder="naam">
        <span class="error <?php if(empty($errors['name'])) echo 'hide'?>">Gelieve uw naam in te vullen</span>

        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password" placeholder="wachtwoord">
        <span class="error <?php if(empty($errors['password'])) echo 'hide'?>">Gelieve een wachtwoord in te vullen</span>

        <label for="cardID">Docentenkaartnummer</label>
        <input type="text" name="cardId" id='cardID' placeholder="kaartnummer">
        <span class="error <?php if(empty($errors['cardId'])) echo 'hide'?>">Gelieve uw docentenkaartnummer in te vullen</span>

        <label for="email">Email adres</label>
        <input type="email" name="email" placeholder="voornaam.naam@school.be">
         <span class="error <?php if(empty($errors['email'])) echo 'hide'?>">Gelieve uw emailadres in te vullen</span>

        <input type="submit" name="submit" value="the shining aanvragen">
      </form>

      <h1>Dit is om je recentie op te sturen</h1>
      <form action="api/participations/create" method="POST" enctype="multipart/form-data">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="paswoord">
        <input type="text" name="school" placeholder="school">
        <input type="text" name="klas" placeholder="klas">
        <input type="file" name="photo" placeholder="photo">
        <input type="file" name="pdf" placeholder="pdf">
        <input type="submit" name="submit" value="deelnamen aan de actie">
      </form>
    </div>
  <script>
    window.app = window.app || {};
    window.app.basename = '<?php echo $basePath;?>';
  </script>
  <script src="<?php echo $basePath;?>/js/script.js"></script>
</body>
</html>
