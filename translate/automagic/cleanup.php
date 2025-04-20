<?php

printf(" > Alright, let's clean everything up!\n");
printf(" > Reading config...\n");
$config = json_decode(file_get_contents("./cleanup.config.json"));

$tentries = 0;

foreach ($config->files as $file) {
    printf(" > Let's clean up « " . $file . " »\n");
    $entries = json_decode(file_get_contents($file));
    $nentries = [];
    $reg_triggers = [];

    foreach ($entries as $entry) {
        if (in_array(ucwords($entry->trigger), $reg_triggers)) {
            printf(" > « " . $entry->trigger . " » already registered, removing the other entry.\n");
        } else {
            if (trim(ucwords($entry->trigger)) == "") {
                printf(" > Empty entry, removing it.\n");
            } else {
                array_push($reg_triggers, ucwords($entry->trigger));
                $i = 0;
                $entry->trigger = ucwords($entry->trigger);
                foreach ($entry->responses as $response) {
                    if (is_array($response)) {
                        $entry->responses[$i] = $response[0];
                    }
                    $i++;
                }
                array_push($nentries, $entry);
            }
        }
    }

    printf(" > One last touch...\n");
    file_put_contents($file, json_encode($nentries, JSON_PRETTY_PRINT));
    printf(" > « " . $file . " » is now clean!\n");

    $tentries = $tentries + count($nentries);
}

printf(" > Looks pretty fine, I finished everything! All your files are now clean and without duplicates... " . $tentries . " entries in " . count($config->files) . " file(s).\n");