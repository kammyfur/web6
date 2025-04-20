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
        <link rel="stylesheet" type="text/css" href="/static/css/styles.css">
        <link rel="stylesheet" type="text/css" href="/static/css/fonts.css">
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
                    <h1><?php
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
                        echo("This website is currently under maintenance, but don't worry, it will be back soon!");
                        break;
                    case 'fr':
                        echo("Ce site est actuellement en maintenance, mais pas de panique, il sera bientôt de retour !");
                        break;
                    case 'es':
                        echo("Este sitio está actualmente en mantenimiento, pero no se preocupe, ¡volverá pronto!");
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
                <br>
                <small><a href="https://minteck-projects.alwaysdata.net/status/detached.php">
                        <?php
                switch ($lang) {
                    case 'en':
                        echo("Services Status");
                        break;
                    case 'fr':
                        echo("État des services");
                        break;
                    case 'es':
                        echo("Estado de los servicios");
                        break;
                }
                ?>
                    </a> • <a href="/admin">
                        <?php
                switch ($lang) {
                    case 'en':
                        echo("Website Admin");
                        break;
                    case 'fr':
                        echo("Administration du site");
                        break;
                    case 'es':
                        echo("Administración del sitio");
                        break;
                }
                ?>
                    </a></small>
            </center>
        </div>
    </body>
</html>
