<?php
require_once "./libAdGen.php";
if (isset($_GET['lang'])) {
    if (isset($_GET['format'])) {
        AdGenerator::generateAd($_GET['lang'], $_GET['format']);
    } else {
        AdGenerator::generateAd($_GET['lang'], 'banner');
    }
} else {
    die("Missing 'lang' GET argument");
}