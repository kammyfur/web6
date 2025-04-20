<?php
$bconfig = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/admin/polymermin.json"));
if (!$bconfig->enableTelemetry) {
    echo("<center><h1>Télémétrie désactivée</h1><p>La visionneuse de télémétrie n'est pas activée sur ce site. Accédez aux options de télémétrie depuis le site global pour voir les statistiques de ce site.</p><button onclick='location.href=&quot;/admin&quot;'>Retour</button></center>");
    echo("</section>");
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/bottom.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/footer.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/api/pages/closers.php";
    die();
}