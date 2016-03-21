<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Klassiekers in je klas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>
<body>
    <div class="container form-temp">
      <h1>Dit is om deel te nemen</h1>
      <form action="/" method="POST">
        <label for="name">Docent naam &amp; familienaam</label>
        <input type="text" name="name" id="name" placeholder="naam" <?php if(!empty($_POST['name']) && empty($errors['name'])) echo "value='" .  $_POST['name'] . "'" ?> >
         <?php if(!empty($errors['name'])) { ?>
          <span class="error"><?php echo $errors['name'] ?></span>
        <?php } ?>

        <label for="password">Wachtwoord</label>
        <input type="password" name="password" id="password" placeholder="wachtwoord">
         <?php if(!empty($errors['password'])) { ?>
          <span class="error"><?php echo $errors['password'] ?></span>
        <?php } ?>

        <label for="cardID">Docentenkaartnummer</label>
        <input type="text" name="cardId" id='cardID' placeholder="kaartnummer" <?php if(!empty($_POST['cardId']) && empty($errors['cardId'])) echo "value='" .  $_POST['cardId'] . "'" ?> >
         <?php if(!empty($errors['cardId'])) { ?>
          <span class="error"><?php echo $errors['cardId'] ?></span>
        <?php } ?>

        <label for="email">Email adres</label>
        <input type="email" name="email" placeholder="voornaam.naam@school.be" <?php if(!empty($_POST['email']) && empty($errors['email'])) echo "value='" .  $_POST['email'] . "'" ?>>
         <?php if(!empty($errors['email'])) { ?>
          <span class="error"><?php echo $errors['email'] ?></span>
        <?php } ?>

        <input type="submit" name="submit" value="the shining aanvragen">
      </form>

      <h1>Dit is om je recentie op te sturen</h1>
      <form action="/" method="POST" enctype="multipart/form-data">
        <label for="email_2">Email adres</label>
        <input type="text" name="email_2" id="email_2" placeholder="email" <?php if(!empty($_POST['email_2']) && empty($errors['email_2'])) echo "value='" .  $_POST['email_2'] . "'" ?>>
        <?php if(!empty($errors['email_2'])) { ?>
          <span class="error"><?php echo $errors['email_2'] ?></span>
        <?php } ?>

        <label for="password_2">Paswoord</label>
        <input type="password" name="password" id="password_2" placeholder="paswoord">
        <?php if(!empty($errors['password_2'])) { ?>
          <span class="error"><?php echo $errors['password_2'] ?></span>
        <?php } ?>

        <label for="school">School</label>
        <input type="text" name="school" id="school" placeholder="school" <?php if(!empty($_POST['school']) && empty($errors['school'])) echo "value='" .  $_POST['school'] . "'" ?>>
        <?php if(!empty($errors['school'])) { ?>
          <span class="error"><?php echo $errors['school'] ?></span>
        <?php } ?>

        <label for="class">Klas</label>
        <input type="text" name="class" id="class" placeholder="klas" <?php if(!empty($_POST['class']) && empty($errors['class'])) echo "value='" .  $_POST['class'] . "'" ?>>
         <?php if(!empty($errors['class'])) { ?>
          <span class="error"><?php echo $errors['class'] ?></span>
        <?php } ?>

        <label for="photo">Kies je klasfoto</label>
        <input type="file" name="photo" id="photo" placeholder="photo" <?php if(!empty($_POST['photo']) && empty($errors['photo'])) echo "value='" .  $_POST['photo'] . "'" ?>>
         <?php if(!empty($errors['photo'])) { ?>
          <span class="error"><?php echo $errors['photo'] ?></span>
        <?php } ?>

        <label for="pdf">Kies je boekbespreking</label>
        <input type="file" name="pdf" id="pdf" placeholder="pdf" <?php if(!empty($_POST['pdf']) && empty($errors['pdf'])) echo "value='" .  $_POST['pdf'] . "'" ?>>
         <?php if(!empty($errors['pdf'])) { ?>
          <span class="error"><?php echo $errors['pdf'] ?></span>
        <?php } ?>

        <input type="submit" name="submit" value="deelnemen aan de actie">
      </form>
    </div>
  <script>
    window.app = window.app || {};
    window.app.basename = '<?php echo $basePath;?>';
  </script>
  <script src="<?php echo $basePath;?>/js/script.js"></script>
</body>
</html>
