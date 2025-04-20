<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/meta/class.php";
Polymermin::validateData(["id", "category", "content"]);
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
if (trim($_POST['category']) == "") {
    die("Pas de catégorie donnée");
}
if (trim($_POST['content']) == "") {
    die("Pas de contenu donné");
}
$selected->content = $_POST['content'];
$selected->category = $_POST['category'];
$articles[$sindex] = $selected;
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json", json_encode($articles, JSON_PRETTY_PRINT));
die("ok");