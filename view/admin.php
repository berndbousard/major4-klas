<!DOCTYPE html>
<html lang="nl">
<head>
    <script>
        WebFontConfig = {
            google: {
                families: [ 'Titillium+Web:400,600,700,300:latin' ]
            }
        };
        (function() {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
                        '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
    <meta charset="UTF-8">
    <title>Klassiekers in je klas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="<?php echo $basePath;?>/css/style.css"/>
</head>
<body>
    <div class="react-container">

    </div>
    <script>
        window.app = window.app || {};
        window.app.basename = '<?php echo $basePath;?>';
    </script>
    <script src="<?php echo $basePath;?>/js/script.js"></script>
</body>
</html>
