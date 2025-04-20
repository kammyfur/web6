<?php

// Yandex.Translate API Key
$apikey = "trnsl.1.1.20200518T204709Z.acb2d1223aca34df.5319a2200327fd86d082ade1d729cc1a756e88fc";

// -------------------------------

function terminate() {
    global $return;
    die(utf8_encode(json_encode($return, JSON_PRETTY_PRINT)));
}

if (isset($_GET['lang'])) {
    switch ($_GET['lang']) {
        case 'fr':
            $lang = "fr";
            break;

        case 'en':
            $lang = "en";
            break;

        case 'es':
            $lang = "es";
            break;

        case 'de':
            $lang = "de";
            break;

        case 'nl':
            $lang = "nl";
            break;

        case 'jp':
            $lang = "ja";
            break;

        case 'ja':
            $lang = "ja";
            break;

        case 'zh':
            $lang = "zh";
            break;

        case 'cn':
            $lang = "zh";
            break;

        case 'it':
            $lang = "it";
            break;

        case 'ru':
            $lang = "ru";
            break;
        
        default:
        $lang = "en";
            break;
    }
} else {
    $lang = "fr";
}

$return = [];
header("Content-Type: application/json; charset=utf-8");

$return["code"] = 500;
$return["error"] = "Internal error";
$return["time"] = -1;
$return["config"] = [];
$return["branding"] = [];
$return["branding"]["html"] = "<a href=\"http://translate.yandex.com\">powered by Yandex.Translate</a>";
$return["branding"]["webspace"] = "<a onclick=\"yandexBranding();\">powered by Yandex.Translate</a>";
$return["branding"]["markdown"] = "[powered by Yandex.Translate](http://translate.yandex.com)";
$return["branding"]["wiki"] = "[http://translate.yandex.com powered by Yandex.Translate]";
$return["results"] = [];

if (!isset($_GET['query'])) {
    $return["code"] = 150;
    $return["error"] = "No query";
    terminate();
} else {
    $query = $_GET['query'];
}

$sq = str_replace("<", " ", str_replace(">", " ", $query));
$sq = str_replace("\"", " ", str_replace("\"", " ", $sq));

$sq = trim($sq);
$query = trim($query);

if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/search/api/abuse/" . str_replace("/", "-", str_replace(":", "-", password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT, ["salt" => "mprj_search_8452587545"]))))) {
    $pre = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/search/api/abuse/" . str_replace("/", "-", str_replace(":", "-", password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT, ["salt" => "mprj_search_8452587545"]))));
    $parts = explode(":", $pre);
    if ($parts[0] != date("YmdH")) {
        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/search/api/abuse/" . str_replace("/", "-", str_replace(":", "-", password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT, ["salt" => "mprj_search_8452587545"]))), date("YmdH") . ":1");
    } else {
        if ($parts[1] >= 15) {
            $return["code"] = "400";
            $return["error"] = "Maximal limit reached";
            terminate();
        } else {
            file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/search/api/abuse/" . str_replace("/", "-", str_replace(":", "-", password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT, ["salt" => "mprj_search_8452587545"]))), date("YmdH") . ":" . ($parts[1] + 1));
        }
    }
} else {
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/search/api/abuse/" . str_replace("/", "-", str_replace(":", "-", password_hash($_SERVER['REMOTE_ADDR'], PASSWORD_DEFAULT, ["salt" => "mprj_search_8452587545"]))), date("YmdH") . ":1");
}

$first  = new DateTime( 'now' );
$db = json_decode(utf8_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/crawler/pages.json")));
$matches = [];

$keywords = explode(" ", $sq);
foreach ($keywords as $keyword) {
    foreach ($db as $page) {
        if (trim($page->title) != "") {
            if (trim($page->tagline) != "") {
                if (strpos($page->title, $keyword) !== false || strpos($page->tagline, $keyword) !== false || strpos($page->url, $keyword) !== false) {
                    array_push($matches, $page);
                }
            }
        }
    }
}

$newmatches = [];

if ($lang !== false) {
    foreach ($matches as $match) {
        $resultraw = file_get_contents("https://translate.yandex.net/api/v1.5/tr.json/translate?key=" . $apikey . "&lang=fr-" . $lang . "&text=" . urlencode(utf8_decode($match->title)) . "&text=" . urlencode(utf8_decode($match->tagline)) . "");
        $result = json_decode($resultraw);

        $newmatch = [];
        $newmatch["title"] = $result->text[0];
        $newmatch["url"] = $match->url;
        $newmatch["tagline"] = $result->text[1];
        
        array_push($newmatches, $newmatch);
    }
} else {
    $newmatches = [];

    foreach ($matches as $match) {
        $newmatch = [];
        $newmatch["title"] = utf8_decode($match->title);
        $newmatch["url"] = $match->url;
        $newmatch["tagline"] = utf8_decode($match->tagline);
        
        array_push($newmatches, $newmatch);
    }
    // $newmatches = $matches;
}

$second = new DateTime( 'now' );
$diff = $first->diff( $second );

$return['code'] = 200;
$return['error'] = "Success";
$return['time'] = round(($diff->s * 1000) + ($diff->f * 1000), 3);
$return['config']['language'] = $lang;
$return['config']['query'] = $query;
$return['config']['process'] = $sq;
$return['results'] = $newmatches;

terminate();