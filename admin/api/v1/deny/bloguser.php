<?php
$bconfig = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/admin/polymermin.json"));
if (!$bconfig->enableBlog) {
    echo("<center><h1>Blog désactivé</h1><p>Le blog n'est pas activé sur ce site. Si vous pensez qu'il s'agit d'une erreur, vous pouvez <a href='" . $contactinfo->email->fixes . "'>nous le signaler</a>.</p><button onclick='location.href=&quot;/&quot;'>Accueil</button></center>");
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php";
    die();
}