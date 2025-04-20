<?php
if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/.maintenance")) { // Maintenance is ON
    unlink($_SERVER['DOCUMENT_ROOT'] . "/.maintenance");
} else { // Maintenance is OFF
    file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/.maintenance", "");
}
die("ok");