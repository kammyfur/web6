<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/meta/class.php";
Polymermin::validateData(["id"]);
if (trim($_POST['id']) == "") {
    die("Pas d'identifiant donné");
}
$id = $_POST['id'];
$articles = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
$index = 0;
foreach ($articles as $article) {
    if ($article->id == $id) {
        $selected = $article;
        $sindex = $index;
    }
    $index = $index + 1;
}
if (!isset($selected)) {
    die("Article introuvable");
}
$newarticles = [];
foreach ($articles as $article) {
    if ($article->id != $id) {
        $article->id = (count($newarticles) + 1);
        array_push($newarticles, $article);
    }
}
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json", json_encode($newarticles, JSON_PRETTY_PRINT));
die("ok");