<?php
require_once "./functions.php";
require_once "./crawler.php";
global $database;
$database = [];
global $fileid;
$fileid = 0;
$files = scandir(".");
foreach ($files as $file) {
    if (substr($file, 0, 6) == "pages.") {
        unlink($file);
    }
}
$sites = [
    [
        'root' => "https://minteck-projects.alwaysdata.net",
        'name' => "Minteck Projects",
        'onlyRoot' => false
    ],
    [
        'root' => "https://pinpages.alwaysdata.net",
        'name' => "PinPages",
        'onlyRoot' => false
    ],
    [
        'root' => "https://pinpages.alwaysdata.net/error",
        'name' => "PinPages",
        'onlyRoot' => false
    ],
    [
        'root' => "https://pinpages.alwaysdata.net/permission",
        'name' => "PinPages",
        'onlyRoot' => false
    ],
    [
        'root' => "https://pinpages.alwaysdata.net/allusers",
        'name' => "Utilisateurs de PinPages",
        'onlyRoot' => false
    ],
    [
        'root' => "https://globalwiki.alwaysdata.net",
        'name' => "GlobalWiki",
        'onlyRoot' => true
    ],
    [
        'root' => "http://mpcms.rf.gd",
        'name' => "Minteck Projects CMS",
        'onlyRoot' => false
    ],
    [
        'root' => "http://tyson-fans.rf.gd",
        'name' => "Tyson Fans",
        'onlyRoot' => false
    ],
    [
        'root' => "https://better-search.000webhostapp.com",
        'name' => "BetterSearch",
        'onlyRoot' => false
    ],
    [
        'root' => "https://gitlab.com/minteck-projects",
        'name' => "GitLab",
        'onlyRoot' => true
    ],
    [
        'root' => "https://mpbugger.alwaysdata.net",
        'name' => "Minteck Projects Bugs",
        'onlyRoot' => false
    ],
    [
        'root' => "https://getwebspace.alwaysdata.net",
        'name' => "Minteck Projects WebSpace",
        'onlyRoot' => false
    ],
];
echo("\n\nCrawlR 1.0\n\nCrawlR is part of the R-tools suite.\nCopyright © Minteck Projects Ltd.\n\n");
file_put_contents("all-links.dat", "");
foreach ($sites as $site) {
    echo("Crawling Website: " . $site["name"] . "\n");
    crawl($site["root"], $site["name"], $site['onlyRoot']);
}
echo("\n\n");