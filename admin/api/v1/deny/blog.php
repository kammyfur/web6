<?php
$bconfig = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/admin/polymermin.json"));
if (!$bconfig->enableBlog) {
    echo("<center><h1>Blog désactivé</h1><p>Le blog n'est pas activé sur ce site. Utilisez <a href='/admin/files'>le gestionnaire de fichiers</a> et modifiez le fichier <code>/admin/polymermin.json</code> pour l'activer.</p><button onclick='location.href=&quot;/admin&quot;'>Retour</button></center>");
    echo("</section>");
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php";
    die();
}