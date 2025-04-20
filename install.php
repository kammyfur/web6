<?php
$supported = [ "en", "fr", "es" ];
$ulng = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
if (array_search($ulng, $supported) === false) {
    $lang = "en";
} else {
    $lang = $ulng;
}
?>
<!DOCTYPE html>
<html lang="en" style="margin:0;overflow:hidden;width:100%;height:100%;">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="https://cdn-minteck-projects.000webhostapp.com/images/polymer/logos/svg/global/global-color-fill.svg" type="image/png">
        <title>503 Service Unavailable</title>
        <style>
            * {
                font-weight: 300 !important;
            }
        </style>
    </head>
    <body style='margin:0;overflow:hidden;width:100%;height:100%;font-family:"Ubuntu", -apple-system, "Segoe UI", "Roboto", "Oxygen", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif !important;font-weight:300 !important;'>
        <div id="container" style="background-color:#ddd;display:flex;align-items:center;justify-content:center;width:100%;height:100%;">
            <div>
                <center>
                    <h1 style="font-size: 2.91029rem;"><?php
            switch ($lang) {
                case 'en':
                    echo("Can't keep going!");
                    break;
                case 'fr':
                    echo("Peut pas continuer...");
                    break;
                case 'es':
                    echo("No puede continuar ...");
                    break;
            }
            ?></h1>
                    <p>
                        <?php
                switch ($lang) {
                    case 'en':
                        echo("System operators are currently applying an update to this website, it will be back in a few minutes...");
                        break;
                    case 'fr':
                        echo("Les opérateurs systèmes sont actuellement en train d'appliquer une mise à jour sur ce site, il sera de retour dans quelques minutes...");
                        break;
                    case 'es':
                        echo("Los operadores del sistema están aplicando una actualización en este sitio, volverá en unos minutos ...");
                        break;
                }
                ?>
                    </p>
                </center>
            </div>
        </div>
        <div id="nav" style="position: fixed;bottom:30px;left:0;right:0;">
            <center>
                <img src="https://cdn-minteck-projects.000webhostapp.com/images/polymer/logos/svg/global/global-dark.svg" width="24px" style="vertical-align:middle;"> Minteck Projects
            </center>
        </div>
    </body>
</html>
