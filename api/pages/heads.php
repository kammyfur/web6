
<?php if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.maintenance") && (!(substr($_SERVER['REQUEST_URI'], 0, 6) == "/admin") || ((substr($_SERVER['REQUEST_URI'], 0, 6) == "/admin") && (!isset($_SERVER['REMOTE_USER']) && !isset($_SERVER['PHP_AUTH_USER']))))) {
    require_once $_SERVER['DOCUMENT_ROOT'] . "/maintenance.php";
    die();
} ?>
<?php

// Load config
$config = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/pol3.json"));
$contactinfo = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/contactInfo.json"));
if (json_last_error() != JSON_ERROR_NONE) {
    header("HTTP/1.1 500 Internal Server Error");
    die(str_replace("%signature%", str_replace("</address>\n", '', $_SERVER['SERVER_SIGNATURE']), file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/api/pages/error.html")));
}
$tl = (array)$config->tagline;

$_RENDERER_START = new DateTime('now');

require_once $_SERVER['DOCUMENT_ROOT'] . "/language.php";

?>
<!doctype html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= str_replace("%error%", $lang->errors->title, str_replace("%tagline%", $tl[$_LANGUAGE], $_TITLE)) ?> | <?= $config->sitename ?></title>
        <script src="/static/resources/703e23c9-lazysizesnoscriptnative-loading.js" defer></script>
        <script src="/static/resources/4176b39e-serialize.js"></script>
        <script src="/static/resources/main.js?v=b9ce682" defer></script>
        <script src="/static/resources/global.js" defer></script>
        <script src="/static/js/jquery.js"></script>
        <link rel="stylesheet" type="text/css" href="/static/css/styles.css">
        <link rel="stylesheet" type="text/css" href="/static/css/custom.css">
        <link rel="stylesheet" type="text/css" href="/static/css/fonts.css">
        <link rel="shortcut icon" href="/favicon.png" type="image/png">
        <style>:root { --theme-color: <?= $config->color ?>; --theme-hero-1: <?= $config->hero[0] ?> ; --theme-hero-2: <?= $config->hero[1] ?>; --theme-hero-3: <?= $config->hero[2] ?>; --theme-takeover-1: <?= $config->takeover->colors[0] ?>; --theme-takeover-2: <?= $config->takeover->colors[1] ?>; --theme-takeover-3: <?= $config->takeover->colors[2] ?> }</style>
    </head>
    <body class="">
