<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/admin/api/v1/meta/class.php";
Polymermin::validateData(["title", "category", "content"]);
if (trim($_POST['title']) == "") {
    die("Pas de titre donné");
}
if (trim($_POST['category']) == "") {
    die("Pas de catégorie donnée");
}
if (trim($_POST['content']) == "") {
    die("Pas de contenu donné");
}
$old = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json"));
$append = [
    "date" => date("dmY"),
    "id" => dechex(count($old) + 1),
    "category" => $_POST['category'],
    "title" => $_POST['title'],
    "content" => $_POST['content'],
];
array_unshift($old, $append);
file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/blog/list.json", json_encode($old, JSON_PRETTY_PRINT));
die("ok");