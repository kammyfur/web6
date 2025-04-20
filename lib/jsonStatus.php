<?php
header("Content-Type: application/json");
$status = array();
$status['notice'] = "Services status is now deprecated, only servers can be fetched and are actually up-to-date.";
$status['services'] = array();
$status['servers'] = array();
$items = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/lib/autouptime/monitor.json"));
foreach ($items as $item) {
    $status['servers'][$item->name] = $item->status;
}
// $status = array();
// $status['servers'] = array();
// $status['services'] = array();
// $servers = scandir($_SERVER['DOCUMENT_ROOT'] . "/status/servers");
// $services = scandir($_SERVER['DOCUMENT_ROOT'] . "/status/services");
// $cserver = 0;
// foreach ($servers as $server) {
//     if ($server == "." || $server == "..") {} else {
//         $status['servers'][str_replace("_"," ",$server)] = $cserver . "_" . (int)trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/status/servers/" . $server));
//         $cserver = $cserver + 1;
//     }
// }
// $cserver = 0;
// foreach ($services as $service) {
//     if ($service == "." || $service == "..") {} else {
//         $status['services'][str_replace("_"," ",$service)] = $cserver . "_" . (int)trim(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/status/services/" . $service));
//         $cserver = $cserver + 1;
//     }
// }
echo(json_encode($status));
exit;