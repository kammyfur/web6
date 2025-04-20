<?php

printf(" > Alright, let's add all the custom references!\n");
printf(" > Reading config...\n");
$config = json_decode(file_get_contents("./custom.config.json"));

$tentries = 0;

printf(" > Loading data...\n");
foreach ($config->files as $file) {
    printf(" > Custom references from « " . $file->from . " » will be added to « " . $file->to . " ».\n");
    printf(" > Reading source file...\n");
    $source = json_decode(file_get_contents($file->from));
    printf(" > Reading target file...\n");
    $target = json_decode(file_get_contents($file->to));

    $newtarget = [];

    $c = 1;
    $t = count($source);
    $r = count($source);
    global $avgstr;
    global $avg;
    $avgstr = "0ms";
    $avg = 0;
    foreach ($source as $s_entry) {
        echo(" > " . $c . "/" . $t . " (" . number_format(($c/$t)*100, 2, '.', '') . "%, " . $avgstr . ") : " . $s_entry->trigger . "\n");

        $ot = new DateTime( 'now' );
        foreach ($target as $t_entry) {
            if (ucwords($t_entry->trigger) == ucwords($s_entry->trigger)) {
                printf(" > Entry already in original file, removing the original entry\n");
            } else {
                $i = 0;
                foreach ($t_entry->responses as $response) {
                    if (is_array($response)) {
                        $t_entry->responses[$i] == $response[0];
                    }
                    $i++;
                }
                array_push($newtarget, $t_entry);
            }
        }

        array_push($newtarget, $s_entry);

        $target = $newtarget;
        $newtarget = [];

        foreach ($target as $t_entry) {
            $i = 0;
            foreach ($t_entry->responses as $response) {
                if (is_array($response)) {
                    $t_entry->responses[$i] = $response[0];
                }
                $i++;
            }
            array_push($newtarget, $t_entry);
        }

        $target = $newtarget;
        $newtarget = [];

        $c++;
        $nt = new DateTime( 'now' );
        $diff = $ot->diff( $nt );
        $time = round(($diff->s * 1000) + ($diff->f * 1000), 0);
        global $avg;
        $avg = $r * $time;
        global $avgstr;
        if ($avg > 1000) {
            if ($avg > 60000) {
                if ($avg > 3600000) {
                    $avgstr = round($avg / 3600000, 0) . "h";
                } else {
                    $avgstr = round($avg / 60000, 0) . "m";
                }
            } else {
                $avgstr = round($avg / 1000, 0) . "s";
            }
        } else {
            $avgstr = $avg . "ms";
        }
    }

    printf(" > Just a moment...\n");
    file_put_contents($file->to, json_encode($target, JSON_PRETTY_PRINT));
    $entries = count(json_decode(file_get_contents($file->to)));
    $tentries = $tentries + $entries;
    printf(" > Done! " . $entries . " entries in target file.\n");
}

printf(" > I'm done with all those files! " . $tentries . " entries in " . count($config->files) . " file(s).\n");