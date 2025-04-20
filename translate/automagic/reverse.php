<?php

printf(" > Automagic! Takes out words from text file and translate them\n");

printf(" > Reading config...\n");
$conf = json_decode(file_get_contents("./reverse.config.json"));

foreach ($conf as $config) {
    printf(" > So, I will be reading « " . $config->from . " », reverse the values, and put that in « " . $config->to . " ».\n");

printf(" > Let's first load the original file\n");
$source = json_decode(file_get_contents($config->from));

printf(" > Let's trim \"fancy things\" in this file\n");
$s2 = [];
foreach ($source as $entry) {
    if (count($entry->responses) > 1) {
        $entry->responses = [$entry->responses[0]];
    }

    array_push($s2, $entry);
}

if (count($source) !== count($s2)) {
    printf(" > Huh, something got lost in the meantime. To prevent data lost, let's end now.\n");
    die();
}

$source = $s2;

printf(" > Now let's the magic do its job! Sit and relax, I'll tell you when it's done\n");
$destination = [];
foreach ($source as $entry) {
    $o = [
        "trigger" => $entry->responses[0],
        "responses" => [ $entry->trigger ],
        "type" => $entry->type
    ];

    array_push($destination, $o);
}

if (count($source) !== count($destination)) {
    printf(" > Huh, something got lost in the meantime. To prevent data lost, let's end now.\n");
    die();
}

printf(" > I'm almost done...\n");
file_put_contents($config->to, json_encode($destination, JSON_PRETTY_PRINT));

printf(" > Looks pretty fine, I finished everything! Your ready-to-go file is at « " . $config->to . " »\n");
}