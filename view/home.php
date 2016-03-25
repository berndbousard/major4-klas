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

  <style>html, body, div, span, h1, h2, p, a, ul, li, label, legend, header, nav, section {margin: 0; padding: 0; border: 0; font-size: 100%; font: inherit; vertical-align: baseline; } header, nav, section {display: block; } body {line-height: 1; } ul {list-style: none; } html {box-sizing: border-box; } *, *:before, *:after {box-sizing: inherit; } main {display: block; } .container {width: 85vw; margin: 0 auto; } .hide, .form .hide {display: none; } html, body {height: 100%; } body {background-color: #f7f7f7; position: relative; color: #3E3E3E; } .main-border {border: 1.5rem solid #dedede; width: 100%; height: 100%; position: fixed; box-shadow: inset 0 0 2rem 0 rgba(0, 0, 0, 0.15); z-index: 1000; } .main-nav {margin-left: 5.5rem; padding: 7rem 0 5vw 0; } .main-nav-list, .nav-items {display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-align-items: center; -ms-flex-align: center; align-items: center; } .nav-logo {margin-right: 2rem; } .nav-logo-svg {opacity: 0.4; } .nav-logo-svg-use {fill: #3E3E3E; -webkit-transform: scale(0.45); transform: scale(0.45); } .nav-logo-link {display: -webkit-flex; display: -ms-flexbox; display: flex; width: 6rem; height: 4rem; } .nav-item {margin: 0 1rem; text-align: center; } .nav-item-link {padding: 0.5rem 0.75rem; text-decoration: none; text-transform: uppercase; color: #3E3E3E; font-family: 'Titillium Web'; font-weight: 400; font-size: 0.875rem; max-height: 5rem; letter-spacing: 0.1rem; } .tekst {font-size: 1rem; font-family: 'Titillium Web'; letter-spacing: 0.04rem; line-height: 1.6rem; } .paars {color: #925bf7; } .active {background-color: #925bf7; color: #f7f7f7; } .title {font-size: 2.25rem; font-family: 'Plantagenet Cherokee'; text-shadow: 3rem 1.5rem 0.5rem rgba(0, 0, 0, 0.1); text-transform: uppercase; letter-spacing: 0.2rem; } .cta-button {text-decoration: none; display: inline-block; background-color: #925bf7; padding: 0.8rem 1.8rem; border: 0.4rem solid #925bf7; } .cta-button span {font-size: 1.2rem; font-family: 'Titillium Web'; font-weight: 600; color: #f7f7f7; text-transform: uppercase; letter-spacing: 0.1rem; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-align-items: center; -ms-flex-align: center; align-items: center; } .cta-button span::after {content: ''; display: inline-block; height: 3.2px; height: 0.2rem; width: 28.8px; width: 1.8rem; margin-left: 8px; margin-left: 0.5rem; background-color: #f7f7f7; } .cta-text {text-decoration: none; letter-spacing: 0.1rem; opacity: 0.7; } .cta-text span {font-size: 1rem; font-family: 'Titillium Web'; font-weight: 600; text-transform: uppercase; color: #3E3E3E; text-align: center; } .cta-text span::before {content: '/'; margin-right: 8px; margin-right: 0.5rem; } .cta-text span::after {content: '/'; margin-left: 8px; margin-left: 0.5rem; } .arrow-down {padding-bottom: 3rem; background: url("/assets/svg/pijl.svg") bottom center no-repeat; background-size: 1.27rem 2.17rem; z-index: 100; } .main-container {display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-flex-direction: column; -ms-flex-direction: column; flex-direction: column; } .header-content-wrapper {display: -webkit-flex; display: -ms-flexbox; display: flex; } .header-title {margin: 1rem 0; } .mini-title {font-size: 0.7rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.04rem; opacity: 0.5; } .main-title {text-transform: uppercase; } .header-text {display: block; } .header-title {font-size: 4rem; letter-spacing: 0.5rem; } .header-sub {font-size: 2.25rem; letter-spacing: 0.2rem; } .header-content {display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-justify-content: space-between; -ms-flex-pack: justify; justify-content: space-between; } .catch-phrase-text-wrapper {margin: 2rem 0; width: 70%; } .catch-text {margin: 1rem 0; font-weight: 600; letter-spacing: 0.04rem; font-size: 1.25rem; } .home-arrow {-webkit-align-self: center; -ms-flex-item-align: center; align-self: center; margin-top: 2rem; } .shining-header {padding: 12rem 0 4rem 0; background: url("/assets/img/letter-s.png") left bottom no-repeat; } .shining-title {color: #FFFFFF; text-transform: uppercase; font-size: 5rem; letter-spacing: 0.5rem; text-shadow: 0 0 20px #FFFFFF; } .main-header {height: 100vh; width: 100%; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-flex-direction: column; -ms-flex-direction: column; flex-direction: column; box-sizing: border-box; padding-top: 20vh; margin-top: -20vh; background: url("/assets/img/beeld-header.png") no-repeat, url("/assets/img/grunge-header.png") no-repeat; background-position: top right, center right; background-size: auto 100%, auto 100%; } .tab-header {width: 48%; padding: 1.5rem 0; background-color: #e3d8f7; display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; -webkit-align-items: center; -ms-flex-align: center; align-items: center; letter-spacing: 0.2rem; } .tab-title {text-align: center; font-size: 1.4rem; text-transform: uppercase; } .form-input-wrapper .file-input-replacement {width: 35vw; border: 0.15rem solid #f7f7f7; color: #f7f7f7; background: none; padding: 1rem; opacity: 0.5; font-family: 'titillium web'; font-size: 1.25rem; } .file-input-replacement {padding: 3.5rem 1rem !important; text-align: center; } @media only screen and (max-width: 960px) {.sec-right-the-shining {margin-left: -120px; } } @media only screen and (max-width: 820px) {.sec-right-the-shining {display: none; } .header-title {display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-align-items: center; -ms-flex-align: center; align-items: center; -webkit-flex-direction: column; -ms-flex-direction: column; flex-direction: column; } .catch-phrase {display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-flex-direction: column; -ms-flex-direction: column; flex-direction: column; -webkit-align-items: center; -ms-flex-align: center; align-items: center; } .catch-phrase-text-wrapper {width: 100%; } } @media only screen and (max-width: 800px) {.nav-item {margin: 0; } } @media only screen and (max-width: 750px) {.main-header {margin-bottom: 5rem; } } @media only screen and (max-width: 650px) {.main-border {display: none; } .main-nav {background-color: #3E3E3E; z-index: 100; padding: 0; height: 35vw; margin: 0; } .main-header {background-image: none, url("/assets/img/grunge-header.png"); } .main-nav-list {-webkit-flex-direction: column; -ms-flex-direction: column; flex-direction: column; -webkit-align-items: center; -ms-flex-align: center; -ms-grid-row-align: center; align-items: center; -webkit-justify-content: space-between; -ms-flex-pack: justify; justify-content: space-between; height: 100%; } .nav-logo {margin-top: 1vw; margin-right: 0; padding: 2vw; } .nav-logo-link {width: 7.5rem; height: 5.5rem; } .body-wrapper {padding: 0rem; } .nav-items {width: 100%; } .nav-item {display: -webkit-flex; display: -ms-flexbox; display: flex; -webkit-justify-content: center; -ms-flex-pack: center; justify-content: center; -webkit-flex: 1; -ms-flex: 1; flex: 1; height: 100%; -webkit-align-items: center; -ms-flex-align: center; align-items: center; } .nav-item-link {color: #f7f7f7; text-align: center; width: 100%; padding: 3.5vw; } .main-container {margin-top: 5vw; } .main-header {height: auto; height: initial; } .container {width: 100vw; margin: 0; margin: initial; } .nav-logo-svg-use {-webkit-transform: scale(0.6); transform: scale(0.6); fill: #f7f7f7; } } @media only screen and (max-width: 640px) {.actie-header {background: none; } } @media only screen and (max-width: 600px) {.header-title {font-size: 10vw; } .header-sub {font-size: 7vw; } .catch-phrase-text-wrapper {padding: 0 1rem; } .catch-text {line-height: 2rem; } .title {text-shadow: none; } .tab-title {font-size: 3vw; } } @media only screen and (max-width: 550px) {.home-arrow {display: none; background-image: none; } .tab-title {font-size: 1rem; } .fieldset-uploaden .form-input-wrapper label {width: 90vw; } .nav-item-link {padding: 3.5vw 1vw; } .main-header {margin-bottom: 3vw; } .cta-button {width: 90vw; } } @media only screen and (max-width: 500px) {.nav-logo {margin-bottom: 2vw; } .nav-item-link {font-size: .75rem; } } @media only screen and (max-width: 410px) {.header-title {font-size: 2.75rem; text-shadow: none; letter-spacing: .1rem; } .header-sub {font-size: 2rem; text-align: center; } } @media only screen and (max-width: 400px) {.main-nav {height: 9rem; } }</style>

  <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>

<body class="home">
  <div class="main-border"></div>
  <div class="body-wrapper">
    <nav class="main-nav">
      <ul class="main-nav-list">
        <li class="nav-logo"><a class="nav-logo-link" href="http://www.boek.be">
          <svg class="nav-logo-svg">
            <use class="nav-logo-svg-use" xlink:href="./assets/svg/logo.svg#logo"/>
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
    <main class="main-wrapper actie">
      <header class="main-header actie-header">
        <div class="container main-container">
          <div class="header-content-wrapper">
            <div class="sec-left-actie">
              <section class="header-title">
                <h2 class="mini-title">boek.be presenteert:</h2>
                <div class="main-title-wrapper">
                  <h1 class="main-title"><span class="header-text header-title title paars">klassiekers</span> <span class="header-text header-sub">in je klas</span></h1>
                </div>
              </section>

              <section class="header-content">
                <h1 class="hide">header content</h1>
                <section class="catch-phrase">

                  <div class="catch-phrase-text-wrapper">
                    <p class="tekst catch-text">Zet samen met je klas je tanden in één van de meest meeslepende thrillerboeken ooit.</p>
                    <p class="tekst catch-text">Durf jij je klas uit te dagen om er een killer-boekbespreking over te schrijven?</p>
                  </div>
                  <a href="<?php echo $basePath . '/#form-deelnemen' ?>" class="cta-button"><span class="cta-button-content">mijn klas durft dit</span></a>
                </section>
              </section>
            </div>
            <div class="sec-right-the-shining">
              <section class="the-shining-header">
                <div class="shining-header">
                  <h1 class="shining-title">the shining</h1>
                </div>
              </section>
            </div>
          </div>
          <a href="<?php echo $basePath . '/#actie-uitleg' ?>" class="cta-text arrow-down home-arrow scroll-link"><span>ontdek de actie</span></a>
        </div>
      </header>

      <article class="over-wedstrijd">
        <section class="info-over-wedstrijd">
          <div class="container wedstrijd-container">
            <header>
              <h1 class="title wedstrijd-title"><span class="paars">over</span> de wedstrijd</h1>
            </header>
            <div class="article-content">
              <section class="sec-over">
                <p class="sub-title wedstrijd-subtitle">Bent u <strong class="paars">leerkracht Nederlands</strong> en op zoek naar een spannende <strong class="paars">uitdaging</strong>?</p>
                <section class="wedstrijd-uitleg">
                  <header class="hide">
                    <h1>uitleg over de wedstrijd</h1>
                  </header>
                  <p class="tekst">Maak van een boekbespreking terug een leuke opdracht met de ‘klassiekers uit je klas’ <span class="bold">actie</span> van boek.be.</p>
                  <p class="tekst bottom-text">Lees samen met je leerlingen het boek ‘De Shining’ en schrijf met je klas een <span class="bold">boekbespreking</span> over deze bloedstollende <span class="bold">thriller klassieker</span>. Wie weet sleept jouw klas de <span class="bold">hoofdprijs van 100 boeken</span>
                </section>

              </section>

              <section class="sec-boek-kort-overzicht">
                <header class="hide">
                  <h1>the shining kort overzicht</h1>
                </header>
                <figure class="boek-detail">
                  <img src="<?php echo $basePath . '/assets/img/beeld-boek.png' ?>" class="boek-view" width="227" height="357" alt="the shining boek cover">
                  <figcaption class="boek-caption">
                    <div class="boek-meta">
                      <header>
                        <h1><cite class="boek-cite">The Shining</cite></h1>
                      </header>
                      <p class="tekst boek-text">door Stephan King</p>
                    </div>
                    <a href="<?php echo $basePath . '/#form-deelnemen' ?>" class="cta-button boek-button">
                      <span class="cta-button-content">mijn klas durft dit</span>
                    </a>
                  </figcaption>
                </figure>
              </section>
            </div>
          </div>
        </section>

        <section class="hoe-het-werkt" id="actie-uitleg">
          <div class="container hoe-container">
            <header>
              <h1 class="title hoe-title">hoe het <span class="paars">werkt</span></h1>
            </header>

            <section class="sec-werking">
              <header class="hide">
                <h1>de 3 stappen</h1>
              </header>
              <section class="korte-uitleg sec-uitleg">
                <header>
                  <h1 class="sub-title uitleg-sub">Ben je benieuwd hoe je kan <strong class="paars">deelnemen</strong>?</h1>
                </header>
                <p class="tekst">Aan de hand van deze <span class="bold">3 stappen</span> kan jij als klas deelnemen voor de boek.be actie.</p>
              </section>
              <ol class="uitleg-lijst">
                <li class="uitleg-item">
                  <p class="tekst"><span class="bold">Overtuig je klas</span> om deel te nemen en download het <span class="bold">gratis eBook</span>.</p>
                </li>
                <li class="uitleg-item">
                  <p class="tekst">Schrijf samen met je klas <span class="bold">recensies</span> over het boek en kies er <span class="bold">de beste</span> uit.</p>
                </li>
                <li class="uitleg-item">
                  <p class="tekst"><span class="bold">Upload</span> deze boekbespreking en maak kans om <span class="bold">100 boeken te winnen</span> voor jouw klas.</p>
                </li>
              </ol>
            </section>
          </div>
        </section>
      </article>

      <article class="form" id="form-deelnemen">
        <div class="container form-container">
          <header class="hide">
            <h1>Registreren &amp; recensie opsturen</h1>
          </header>

          <div class="form-wrapper">
            <div class="tab-navigation">
              <div class="tab-header active"><span class="tab-title">boek aanvragen</span></div>
              <div class="tab-header hide" data-on-js="show"><span class="tab-title">recensie opsturen &amp; aanvragen</span></div>
            </div>
      <!-- FORM DEELNEMEN -->
            <form action="<?php echo $basePath . '/' ?>" method="POST" class="main-form form-deelnemen" autocomplete="off">
              <fieldset class="form-container">
                <legend class="hide">boek aanvragen</legend>
                <div class="form-input-fields">

                  <fieldset class="fieldset-persoonlijk">
                    <legend class="hide">persoonlijke gegevens</legend>

                    <div class="form-input-wrapper">
                      <label for="name">docent naam &amp; familienaam</label>
                      <input autocomplete="off" type="text" name="name" id="name" placeholder="naam &amp; achternaam" <?php if(!empty($_POST['name']) && empty($errors['name'])) echo "value='" .  $_POST['name'] . "'" ?> >
                      <?php if(!empty($errors['name'])) { ?>
                        <span class="form-error php-error"><?php echo $errors['name'] ?></span>
                      <?php } ?>
                    </div>

                    <div class="form-input-wrapper">
                      <label for="cardID">docentenkaartnummer</label>
                      <input autocomplete="off" type="text" name="cardId" id="cardID" placeholder="kaartnummer" <?php if(!empty($_POST['cardId']) && empty($errors['cardId'])) echo "value='" .  $_POST['cardId'] . "'" ?> >
                      <?php if(!empty($errors['cardId'])) { ?>
                        <span class="form-error php-error"><?php echo $errors['cardId'] ?></span>
                      <?php } ?>
                    </div>
                  </fieldset>

                  <fieldset class="fieldset-aanmeld">
                    <legend class="hide">aanmeld gegevens</legend>
                    <div class="form-input-wrapper">
                      <label for="email">e-mail adres</label>
                      <input autocomplete="off" type="email" id="email" name="email" placeholder="voornaam.naam@school.be" <?php if(!empty($_POST['email']) && empty($errors['email'])) echo "value='" .  $_POST['email'] . "'" ?> >
                      <?php if(!empty($errors['email'])) { ?>
                        <span class="form-error php-error"><?php echo $errors['email'] ?></span>
                      <?php } ?>
                    </div>
                    <div class="form-input-wrapper">
                      <label for="password">wachtwoord</label>
                      <input autocomplete="off" type="password" name="password" id="password" placeholder="wachtwoord">
                      <?php if(!empty($errors['password'])) { ?>
                        <span class="form-error php-error"><?php echo $errors['password'] ?></span>
                      <?php } ?>
                    </div>
                  </fieldset>

                </div>
                <div class="cta-button form-submit-button">
                  <label for="the-shining-aanvragen">the shining aanvragen</label>
                  <input type="submit" id="the-shining-aanvragen" class="hide" name="submit" value="the shining aanvragen">
                </div>
              </fieldset>
            </form>
            <!-- FORM OPSTUREN -->
            <!-- JS HIDE CLASS -->
            <div class="tab-navigation-remove" data-on-js="hide">
              <div class="tab-header active"><span class="tab-title">recensie opsturen &amp; aanvragen</span></div>
            </div>
            <form action="<?php echo $basePath ?>" method="POST" data-on-js="hide" enctype="multipart/form-data" class="main-form form-opsturen" autocomplete="off">
              <fieldset class="form-container">
                <legend class="hide">recensie opsturen</legend>
                <div class="form-input-fields">

                  <fieldset class="fieldset-extra">
                    <legend class="hide">extra gegevens</legend>

                    <fieldset class="fieldset-aanmelden">
                      <legend class="hide">gelieve u eerst aanmelden</legend>
                      <div class="form-input-wrapper">
                        <label for="email_2">e-mail adres</label>
                        <input autocomplete="off" type="text" name="email_2" id="email_2" placeholder="email" <?php if(!empty($_POST['email_2']) && empty($errors['email_2'])) echo "value='" .  $_POST['email_2'] . "'" ?> >
                        <?php if(!empty($errors['email_2'])) { ?>
                          <span class="form-error php-error"><?php echo $errors['email_2'] ?></span>
                        <?php } ?>
                      </div>
                      <div class="form-input-wrapper">
                        <label for="password_2">paswoord</label>
                        <input autocomplete="off" type="password" name="password_2" id="password_2" placeholder="paswoord">
                        <?php if(!empty($errors['password_2'])) { ?>
                          <span class="form-error php-error"><?php echo $errors['password_2'] ?></span>
                        <?php } ?>
                      </div>
                    </fieldset>

                    <fieldset class="fieldset-klas-gegevens">
                      <legend class="hide">klas gegevens</legend>
                      <div class="form-input-wrapper">
                        <label for="school">school</label>
                        <input autocomplete="off" type="text" name="school" id="school" placeholder="school" <?php if(!empty($_POST['school']) && empty($errors['school'])) echo "value='" .  $_POST['school'] . "'" ?> >
                        <?php if(!empty($errors['school'])) { ?>
                          <span class="form-error php-error"><?php echo $errors['school'] ?></span>
                        <?php } ?>
                      </div>
                      <div class="form-input-wrapper">
                        <label for="class">klas</label>
                        <input autocomplete="off" type="text" name="class" id="class" placeholder="klas" <?php if(!empty($_POST['class']) && empty($errors['class'])) echo "value='" .  $_POST['class'] . "'" ?> >
                        <?php if(!empty($errors['class'])) { ?>
                          <span class="form-error php-error"><?php echo $errors['class'] ?></span>
                        <?php } ?>
                      </div>
                    </fieldset>
                  </fieldset>

                  <fieldset class="fieldset-uploaden">
                    <legend class="hide">bestanden uploaden</legend>
                    <div class="form-input-wrapper">
                      <label for="pdf">kies je boekbespreking</label>
                      <label for="pdf" class="file-input-replacement hide" data-on-js="show">klik om je pdf te selecteren</label>
                      <input type="file" class="file-input" data-on-js="hide" name="pdf" id="pdf">
                      <?php if(!empty($errors['pdf'])) { ?>
                        <span class="form-error php-error"><?php echo $errors['pdf'] ?></span>
                      <?php } ?>
                    </div>
                    <div class="form-input-wrapper">
                      <label for="photo">kies je klasfoto</label>
                      <label for="photo" class="file-input-replacement hide" data-on-js="show">klik om je klasfoto te selecteren</label>
                      <input type="file" class="file-input" data-on-js="hide" name="photo" id="photo">
                      <?php if(!empty($errors['photo'])) { ?>
                        <span class="form-error php-error"><?php echo $errors['photo'] ?></span>
                      <?php } ?>
                    </div>
                    <div class="cta-button form-submit-button">
                      <label for="deelnemen">deelnemen aan de actie</label>
                      <input type="submit" id="deelnemen" class="hide" name="submit" value="deelnemen aan de actie">
                    </div>
                  </fieldset>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </article>

      <article class="deelnemende-klassen">
        <div class="container klassen-container">
          <header>
            <h1 class="title klassen-title"><span class="paars">deelnemende</span> klassen</h1>
          </header>
          <section class="klassen-list">
            <a href="#" class="cta-text arrow-right klassen-button"><span>bekijk alle deelnemers</span></a>
            <?php if(!empty($photos)) echo "<ol class='recentste-klassen'>"  ?>
              <?php foreach($photos as $photo) { ?>
              <li class="klas-list-item">
                <figure class="klas-figure">
                  <div class="klas-foto-wrapper">
                    <div class="foto-overlay"></div>
                    <img src="<?php echo '/uploads/photo/' . $photo['photo'] ?>" class="klas-foto" alt="klas Middelbaar-dorent" width="316" height="240">
                  </div>
                  <figcaption class="klas-info">
                    <h1 class="klas-school klas-onderschrift"><?php echo $photo['school'] ?></h1>
                    <h2 class="klas-class klas-onderschrift"><?php echo $photo['class'] ?></h2>
                  </figcaption>
                </figure>
              </li>
              <?php } ?>
            <?php if(!empty($photos)) echo "</ol>"  ?>
            <?php if(empty($photos)) { ?>
              <span class="no-participations">Er heeft zich nog geen enkele klas ingeschreven.</span>
            <?php } ?>
          </section>
        </div>
      </article>
    </main>
    <footer class="main-footer">
      <div class="container footer-container">
        <section class="footer-social footer-section">
          <ul class="footer-social-list">
            <li><a href="#" class="social-button social-twitter"><span class="hide">twitter</span></a></li>
            <li><a href="#" class="social-button social-facebook"><span class="hide">facebook</span></a></li>
          </ul>
        </section>

        <section class="footer-boek-be footer-section">
          <a href="http://www.boek.be" class="footer-logo"><span class="hide">boek.be</span></a>
        </section>

        <section class="footer-contact footer-section">
          <ul class="footer-contact-list">
            <li class="footer-contact-item">
              <p class="contact-text"><span class="bold">telefoon</span> +32 3 230 89 23</p>
            </li>
            <li class="footer-contact-item">
              <p class="contact-text"><span class="bold">e-mail</span> info@boek.be</p>
            </li>
          </ul>
        </section>
      </div>
    </footer>
  </div>
  <script>
    window.app = window.app || {};
    window.app.basename = '<?php echo $basePath;?>';
  </script>
  <script src="<?php echo $basePath;?>/js/script.js"></script>
</body>
</html>
