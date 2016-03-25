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

<body>
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
            <a href="<?php echo $basePath . '/' ?>" class="nav-item-link"><span>de actie</span></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $basePath . '/about' ?>" class="active nav-item-link"><span>over de shining</span></a>
          </li>
          <li class="nav-item">
            <a href="<?php echo $basePath . '/#form-deelnemen' ?>" class="nav-item-link scroll-link"><span>deelnemen</span></a>
          </li>
        </div>
      </ul>
    </nav>
    <main class="main-wrapper over">
      <header class="over-header">
        <div class="container over-container">
          <section class="sec-over-boek">
            <div class="over-heading">
              <h1 class="title">the <span class="paars">shining</span></h1>
              <q class="sub-title quote over-sub-title">Sometimes human places, create <span class="paars">inhuman monsters</span></q>
            </div>
            <div class="over-content">
              <p class="tekst over-content-text">Bloedstollend, mysterieus en angstwekkend kunnen het niet genoeg omschrijven waar dit boek precies over gaat. Ondanks zijn ouderdom wordt deze oerklassieker van het thrillergenre nog steeds als referentie gebruikt binnen de literatuur.</p>
              <p class="tekst over-content-text">Dit boek is geschikt vanaf 16 jaar en ideaal voor studenten die zich willen vastbijten in dit duister verhaal.</p>
              <a href="/#form-deelnemen" class="cta-button aanvragen-button"><span class="cta-button-content">the shining aanvragen</span></a>
            </div>
          </section>

          <section class="sec-beeld-boek">
            <picture>
              <!-- Kan hij kleiner met webp? -->
              <img src="<?php echo $basePath . '/assets/img/beeld-boek.png' ?>" class="boek-view" width="227" height="357" alt="the shining boek cover">
            </picture>
            <q class="sub-title quote about-subtitle">I’m not gonna hurt ya. I'm just going to <span class="paars">bash your brains</span> in</q>
          </section>
        </div>
      </header>

      <article class="boek-omschrijving">
        <header>
          <h1 class="title boek-desc-title">het <span class="paars">verhaal</span></h1>
        </header>
          <ol class="omschrijving-list">
            <li class="omschrijving-item">
              <div class="omschrijving-item-wrapper">
                <div class="omschrijving-content-wrapper">
                  <header>
                    <h1 class="omschrijving-title">duister verleden</h1>
                  </header>
                  <p class="tekst omschrijving-tekst">Wat nooit aan het daglicht is gekomen, zijn de gruwelijke feiten die zich afgespeeld hebben in het verleden. Deze zijn niets voor niets in de doofpot gestopt.</p>
                </div>
                <svg class="omschrijving-kader" viewBox="0 0 208 216.29" width="100" height="100">
                  <use xlink:href="<?php echo $basePath . '/assets/svg/6-hoek-groot-2.svg#Layer_1'  ?>"></use>
                </svg>
              </div>
            </li>
            <li class="omschrijving-item">
              <div class="omschrijving-item-wrapper">
                <div class="omschrijving-content-wrapper">
                  <header>
                    <h1 class="omschrijving-title">nieuwe familie</h1>
                  </header>
                  <p class="tekst omschrijving-tekst">Een niets vermoedend gezin komt tijdens de winter toezien op het hotel. Beetje bij beetje ontdekken ze de eigen wil van het etablissement.</p>
                </div>
                <svg class="omschrijving-kader" viewBox="0 0 208 216.29" width="100" height="100">
                  <use xlink:href="<?php echo $basePath . '/assets/svg/6-hoek-groot-2.svg#Layer_1'  ?>"></use>
                </svg>
              </div>
            </li>
            <li class="omschrijving-item">
              <div class="omschrijving-item-wrapper">
                <div class="omschrijving-content-wrapper">
                  <header>
                    <h1 class="omschrijving-title">shining van danny</h1>
                  </header>
                  <p class="tekst omschrijving-tekst">Zoontje Danny ontdekt zijn gave, waardoor hij langzaamaan achterhaalt  wat zijn familie te wachten staat.</p>
                </div>
                <svg class="omschrijving-kader" viewBox="0 0 208 216.29" width="100" height="100">
                  <use xlink:href="<?php echo $basePath . '/assets/svg/6-hoek-groot-2.svg#Layer_1'  ?>"></use>
                </svg>
              </div>
            </li>
          </ol>
      </article>

      <article class="over-auteur">
        <header class="hide">
          <h1>Uitleg over de auteur</h1>
        </header>
        <div class="container auteur-container">
          <section class="bibliografie">
            <header class="hide">
              <h1>Korte Bibliografie</h1>
            </header>
            <ul class="bib-lijst">
              <li class="bib-item">
                <figure class="bib-figure">
                  <picture class="bib-img">
                    <source srcset="<?php echo $basePath . '/assets/img/bibliografie/boek-salem.webp' ?>">
                    <img class="bib-img" src="<?php echo $basePath . '/assets/img/bibliografie/boek-salem.jpg' ?>" class="bib-boek" alt="Salem's Lot">
                  </picture>
                  <figcaption class="bib-boek-meta">
                    <h1 class="bib-boek-naam">Salem's Lot</h1>
                  </figcaption>
                </figure>
                <p class="bib-boek-genre">Fictie</p>
              </li>
              <li class="bib-item">
                <figure class="bib-figure">
                  <picture class="bib-img">
                    <source srcset="<?php echo $basePath . '/assets/img/bibliografie/boek-running.webp' ?>">
                    <img class="bib-img" src="<?php echo $basePath . '/assets/img/bibliografie/boek-running.jpg' ?>" class="bib-boek" alt="The Running Man">
                  </picture>

                  <figcaption class="bib-boek-meta">
                    <h1 class="bib-boek-naam">The Running Man</h1>
                  </figcaption>
                </figure>
                <p class="bib-boek-genre">Sciencefictie</p>
              </li>
            </ul>
          </section>
          <div class="auteur-content-wrapper">
            <section class="over-auteur-content">
              <header class="over-auteur-header">
                <h1 class="title over-auteur-title">Stephan <span class="paars">King</span></h1>
              </header>
              <section class="over-auteur-text">
                <p class="tekst">Al zijn hele leven schrijft Stephen King verhalen en droomde ervan als kind later <span class="bold">schrijver</span> te worden. Na zijn korte carriere als docent ging hij zijn <span class="bold">kinderdroom</span> achterna en bouwde zijn carriere als schrijver uit.</p>
                <p class="tekst">Vandaag staat Stephen bekend om zijn <span class="bold">horror en fantasy</span> boeken die al tal van  prijzen in de wacht hebben gesleept. Zijn bekendste boeken als ‘Carrie’, <span class="bold">‘The Shining’</span> en ‘IT’ zijn zelfs al verfilmd geweest.</p>
              </section>
            </section>
            <section class="auteur-beeld">
              <header class="hide">
                <h1>image stephan king</h1>
              </header>
              <picture>
                <source srcset="<?php echo $basePath . '/assets/img/beeld-auteur.webp' ?>">
                <img src="<?php echo $basePath . '/assets/img/beeld-auteur.png' ?>" alt="Foto Stephan King">
              </picture>
            </section>
          </div>
        </div>
      </article>

      <article class="reviews-pers">
        <div class="container review-container">
          <header>
            <h1 class="title reviews-title">wat zegt de <span class="paars">pers</span>?</h1>
          </header>
          <section class="reviews-content">
            <header class="hide">
              <h1>reviews van de pers</h1>
            </header>
            <ul class="reviews-list">
              <li class="review-item">
                <blockquote class="review-quote">
                  <p class="tekst quote review-quote-text">The Shining kon me doorheen de hele periode dat ik het las boeien. De meest onverwachtse gebeurtenissen in een angstaanjagend jasje.</p>
                  <footer class="quote-footer tekst">Karel Verhoeven - <span class="bold">De Standaard</span></footer>
                </blockquote>
              </li>
              <li class="review-item">
                <blockquote class="review-quote">
                  <p class="tekst quote review-quote-text">Stephen King weet me keer op keer te verrassen mijn zijn boeken en The Shining is hier geen uitzondering op. Elk hoofdstuk dat je gelezen hebt nodigt uit naar meer.</p>
                  <footer class="quote-footer tekst">Guy Mortier - <span class="bold">Humo</span></footer>
                </blockquote>
              </li>
            </ul>
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
