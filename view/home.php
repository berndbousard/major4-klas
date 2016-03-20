<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Klassiekers in je klas</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>
<body>
    <div class="container">
      <header>
        <h1>Dit is de gewone site</h1>
      </header>
      <span>Dit is om deel te nemen</span>
      <form action="api/orders/create" method="POST">
        <input type="text" name="name" placeholder="naam">
        <input type="password" name="password" placeholder="paswoord">
        <input type="text" name="cardId" placeholder="leerkracht ID">
        <input type="email" name="email" placeholder="email">
        <input type="submit" name="submit">
      </form>

      <span>Dit is om je recentie op te sturen</span>
      <form action="api/participations/create" method="POST" enctype="multipart/form-data">
        <input type="text" name="email" placeholder="email">
        <input type="password" name="password" placeholder="paswoord">
        <input type="text" name="school" placeholder="school">
        <input type="text" name="klas" placeholder="klas">
        <input type="file" name="photo" placeholder="photo">
        <input type="file" name="pdf" placeholder="pdf">
        <input type="submit" name="submit">
      </form>
    </div>
  <script>
    window.app = window.app || {};
    window.app.basename = '<?php echo $basePath;?>';
  </script>
  <script src="<?php echo $basePath;?>/js/script.js"></script>
</body>
</html>
