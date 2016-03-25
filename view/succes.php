<!DOCTYPE html>
<html lang="nl">
<head>
  <script type="text/javascript">
    WebFontConfig = {
      custom: {
        families: ['Plantagenet Cherokee'],
        urls: ["<?php echo $basePath . '/assets/fonts/plantagenetCherokee/plantagenetCherokee.css' ?>"]
      },
      google: { families: [ 'Titillium+Web:400,600,300,700:latin' ] }
    };
    (function() {
      var wf = document.createElement('script');
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
      wf.type = 'text/javascript';
      wf.async = 'true';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(wf, s);
    })();
  </script>

  <meta charset="UTF-8">
  <title>Klassiekers in je klas</title>
  <meta name="author" content="Kevin Hendrickx, Bernd Bousard"/>
  <meta name="description" content="promotiesite voor de boek.be campagne"/>
  <meta name="keywords" content="boek.be, the shining, boek, klas, boekbespreking, mysterieus"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>

<body class="succes">
  <div class="main-border"></div>
    <div class="body-wrapper">
      <nav class="main-nav">
        <ul class="main-nav-list">
          <li class="nav-logo"><a class="nav-logo-link" href="http://www.boek.be">
            <svg class="nav-logo-svg">
              <use class="nav-logo-svg-use" xlink:href="<?php echo $basePath . '/assets/svg/logo.svg#logo' ?>"/>
            </svg>
            <span class="hide">boek.be</span></a>
          </li>
          <div class="nav-items">
            <li class="nav-item">
              <a href="<?php echo $basePath ?>" class="active nav-item-link"><span>de actie</span></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $basePath . '/about' ?>" class="nav-item-link"><span>over de shining</span></a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $basePath . '/#form-deelnemen' ?>" class="nav-item-link scroll-link"><span>deelnemen</span></a>
            </li>
          </div>
        </ul>
      </nav>
    </div>
  </div>

  <section class="succes-wrapper">
    <?php if(isset($_GET['type']) && $_GET['type'] == 'registreren') { ?>
      <span class="succes-bedanking">Bedankt voor je registratie!</span>
      <p class="registreer-text succes-text">Binnen enkele ogenblikken kan je jouw e-book van The Shining verwachten in je mailbox. We wensen je klas veel succes met het maken van de boekbesprekingen.</p>
      <span class="yay">Laat je collega's weten van je registratie</span>

    <?php } elseif(isset($_GET['type']) && $_GET['type'] == 'inschrijven') { ?>
      <span class="succes-bedanking">Bedankt voor jouw inzending !</span>
      <p class="inschrijven-text succes-text">Onze jury zal de boekbespreking van je klas aandachtig lezen. Je mag de resultaten van je actie  Hou je mailbox zeker in de gaten.</p>
      <span class="yay">Laat je collega's weten van je deelname</span>
    <?php } ?>
    <?php if(isset($_GET['type'])) { ?>
      <section class="footer-social footer-section succes-social">
          <ul class="footer-social-list">
            <li><a href="#" class="social-button social-twitter"><span class="hide">twitter</span></a></li>
            <li><a href="#" class="social-button social-facebook"><span class="hide">facebook</span></a></li>
          </ul>
        </section>
    <?php } ?>
    <a href="<?php echo $basePath ?>" class="cta-button succes-button"><span class="cta-button-content">terug naar de website</span></a>
  </section>
</body>
