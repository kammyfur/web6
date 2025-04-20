<?php
global $database;
global $fileid;
function crawl($page, $name, $onlyRoot) {
    global $database;
    global $fileid;
    echo("Crawl: " . $page . "\n");
    $ch = curl_init();
    echo("Crawl: " . $page . ": Loaded engine\n");
    curl_setopt($ch, CURLOPT_URL, $page);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $user_agent='+MinteckProjectsBot/1.0';
    curl_setopt ($ch, CURLOPT_USERAGENT, $user_agent);
    curl_setopt ($ch, CURLOPT_HEADER, 0);
    curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT,120);
    curl_setopt ($ch,CURLOPT_TIMEOUT,120);
    curl_setopt ($ch,CURLOPT_MAXREDIRS,10);
    curl_setopt ($ch, CURLOPT_HTTPHEADER, array("Cookie: lang=fr"));
    curl_setopt ($ch,CURLOPT_COOKIEFILE,"cookies.dat");
    echo("Crawl: " . $page . ": Loaded settings" . "\n");
    $output = curl_exec($ch);
    echo("Crawl: " . $page . ": Fetched content" . "\n");
    curl_close($ch);
    echo("Crawl: " . $page . ": Closed engine, processing data..." . "\n");
    echo("Parse: " . $page . ": Loading page title" . "\n");
    $title = $name;
    $res = preg_match("/<title>(.*)<\/title>/siU", $output, $title_matches);
    if (isset($title_matches[1])) {
        $tmp = preg_replace('/\s+/', ' ', $title_matches[1]);
        $title = trim($tmp);
    } else {
        $title = $name;
    }
    echo("Parse: " . $page . ": Is named " . $title . "\n");
    echo("Parse: " . $page . ": Loading page tagline\n");
    $striped = preg_replace('#<title(.*?)>(.*?)</title>#is', ' ', $output);
    $striped = preg_replace('#<script(.*?)>(.*?)</script>#is', ' ', $striped);
    $striped = preg_replace('#<style(.*?)>(.*?)</style>#is', ' ', $striped);
    $striped = preg_replace('#<header(.*?)>(.*?)</header>#is', ' ', $striped);
    $striped = preg_replace('#<footer(.*?)>(.*?)</footer>#is', ' ', $striped);
    $striped = preg_replace('#<nav(.*?)>(.*?)</nav>#is', ' ', $striped);
    $striped = preg_replace('#<a(.*?)>(.*?)</a>#is', ' ', $striped);
    $striped = preg_replace('#<button(.*?)>(.*?)</button>#is', ' ', $striped);
    $striped = preg_replace('#<label(.*?)>(.*?)</label>#is', ' ', $striped);
    $tmplines = explode("\n", $striped);
    $lines = [];
    foreach ($tmplines as $line) {
        array_push($lines, trim($line));
    }
    $strip = strip_tags(implode(" ", $lines));
    $pretagline = preg_replace('/\s+/', ' ', $strip);
    if (strlen($pretagline) > 147) {
        $tagline = substr(trim($pretagline), 0, 147) . " ...";
    } else {
        $tagline = trim($pretagline);
    }
    echo("Parse: " . $page . ": Tagline is " . $tagline . "\n");
    echo("Links: " . $page . ": Gathering links...\n");
    $dom = new DOMDocument;
    @$dom->loadHTML($output);
    $links = $dom->getElementsByTagName('a');
    $pglinks = [];
    $ilinks = [];
    foreach ($links as $link) {
        $parsed = parse_url($link->getAttribute('href'));
        $url = explode("#", $link->getAttribute('href'))[0];
        $url = str_replace("%2F", "/", $url);
        $url = rtrim($url, "/");
        if ($url != parse_url($page, PHP_URL_SCHEME) . "://" . parse_url($page, PHP_URL_HOST) && stripos($url, "connexion") === false && stripos($url, "login") === false && stripos($url, "signup") === false && stripos($url, "créer un compte") === false && stripos($url, "créer_un_compte") === false && stripos($url, "register") === false && stripos($url, "Cr%C3%A9er_un_compte") === false && stripos($url, "Cr%C3%A9er un compte") === false && strpos($url, "Sp%C3%A9cial:") === false && strpos($url, "Special:") === false && stripos($url, "Mod%C3%A8le:") === false && stripos($url, "Modele:") === false && stripos($url, "Template:") === false && stripos($url, "MediaWiki:") === false && stripos($url, "Discussion") === false && stripos($url, "Talk") === false) {
            if (parse_url($url, PHP_URL_HOST) == parse_url($page, PHP_URL_HOST)) {
                array_push($pglinks, [
                    'name' => $link->nodeValue,
                    'url' => parse_url($page, PHP_URL_SCHEME) . "://" . parse_url($page, PHP_URL_HOST) . $url
                ]);
            } else {
                if (substr($url, 0, 1) == "/") {
                    if (trim($url) == "/" || trim($url) == "//" || trim($url) == "///") {
                        array_push($ilinks, [
                            'name' => $link->nodeValue,
                            'url' => parse_url($page, PHP_URL_SCHEME) . "://" . parse_url($page, PHP_URL_HOST) . $url
                        ]);
                    } else {
                        array_push($pglinks, [
                            'name' => $link->nodeValue,
                            'url' => parse_url($page, PHP_URL_SCHEME) . "://" . parse_url($page, PHP_URL_HOST) . $url
                        ]);
                    }
                } else {
                    if (substr($url, 0, 4) == "http") {
                        array_push($ilinks, [
                            'name' => $link->nodeValue,
                            'url' => parse_url($page, PHP_URL_SCHEME) . "://" . parse_url($page, PHP_URL_HOST) . $url
                        ]);
                    } else {
                        if (substr($url, 0, 7) == "mailto:" || substr($url, 0, 4) == "tel:") {
                            array_push($ilinks, [
                                'name' => $link->nodeValue,
                                'url' => parse_url($page, PHP_URL_SCHEME) . "://" . parse_url($page, PHP_URL_HOST) . parse_url($page, PHP_URL_PATH) . $url
                            ]);
                        }
                    }
                }
            }
        }
    }
    echo("Adding page to database...\n");
    array_push($database, [
        'title' => $title,
        'tagline' => $tagline,
        'url' => $page,
        // 'links' => $pglinks
    ]);
    file_put_contents("pages.json", json_encode(utf8ize($database), JSON_PRETTY_PRINT));
    echo("Adding link to links database...\n");
    file_put_contents("all-links.dat", file_get_contents("all-links.dat") . "\n" . $page);
    echo("Fetching other links on the page...\n");
    if (!$onlyRoot) {
        if (count($pglinks) > 0) {
            echo("Things to fetch\n");
            foreach ($pglinks as $link) {
                if ($link['url'] != $page) {
                    echo("Link seems original\n");
                    $dblinks = explode("\n", file_get_contents("all-links.dat"));
                    $required = true;
                    $index = 0;
                    foreach ($dblinks as $dblink) {
                        if (trim($dblink) != "") {
                            // echo("[{$index}] Link isn't empty");
                            if (trim($dblink) == $link['url']) {
                                echo("Page already in database, ignoring\n");
                                $required = false;
                            } else {
                                // echo("[{$index}] Link not in database: " . trim($dblink) . " ≠ " . $link['url'] . "\n");
                            }
                        } else {
                            echo("[{$index}] Link is empty\n");
                        }
                        $index++;
                    }
                } else {
                    echo("Page linking to itself, isn't that useless?\n");
                    $required = false;
                }
                if ($required) {
                    crawl($link['url'], $link['name'], true);
                }
            }
        } else {
            echo("Nothing more to fetch\n");
        }
    } else {
        echo("Fetch is disabled by crawler config\n");
    }
}