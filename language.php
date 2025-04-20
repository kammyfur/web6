<?php

if (isset($_GET['hl'])) {
    if (trim($_GET['hl']) == "fr") {
        setcookie("language", "fr", time()+60*60*24*30, "/");
        $_LANGUAGE = "fr";
        $autolang = false;
    }
    if (trim($_GET['hl']) == "en") {
        setcookie("language", "en", time()+60*60*24*30, "/");
        $_LANGUAGE = "en";
        $autolang = false;
    }
}

if (isset($_COOKIE['language'])) {
    if ($_COOKIE['language'] == "fr" || $_COOKIE['language'] == "en") {
        $_LANGUAGE = $_COOKIE['language'];
        $autolang = false;
        try {
            $lang = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/static/i18n/" . $_COOKIE['language'] . ".json"));
        } catch (Warning $err) {
            echo("<br><b>ProjectsRendR:</b> Failed to load language file");
        }
    } else {
        $_LANGUAGE = "fr";
        $autolang = true;
        $lang = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/static/i18n/fr.json"));
    }
} else {
    $_LANGUAGE = "fr";
    $autolang = true;
    $lang = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/static/i18n/fr.json"));
}

if (!$autolang && !isset($_COOKIE['langwarn'])) {
    setcookie('langwarn', "true", time()+60*60*24*30, "/");
}