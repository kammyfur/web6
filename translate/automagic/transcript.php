<?php

require "tapi.php";
printf(" > Let's transcript everything!\n");
printf(" > Reading config...\n");
$config = json_decode(file_get_contents("./transcript.config.json"));

foreach ($config->files as $file) {
    printf(" > So I will import « " . $file->file->from . " » which is a dictionary to translate « " . $file->languages->source->from . " » to « " . $file->languages->destination->from . " », and convert it to « " . $file->file->to . " » which will be dictionary to translate « " . $file->languages->source->to . " » to « " . $file->languages->destination->to . " »\n");

    $source = json_decode(file_get_contents($file->file->from));
    $destination = [];

    $p = 1;
    $t = count($source);
    $r = count($source);
    global $avgstr;
    global $avg;
    $avgstr = "0ms";
    $avg = 0;
    foreach ($source as $s_entry) {
        echo(" > " . $p . "/" . $t . " (" . number_format(($p/$t)*100, 2, '.', '') . "%, " . $avgstr . ") : " . $s_entry->trigger . "\n");

        if (trim($s_entry->trigger) != "") {
            $ot = new DateTime( 'now' );
            $o_trigger = $s_entry->trigger;
            $o_response = $s_entry->responses[0];
            if ($file->languages->source->from == $file->languages->source->to) {
                $n_trigger = $o_trigger;
            } else {
                $n_trigger = tapi($o_trigger, $file->languages->source->from, $file->languages->source->to);
            }
            if ($file->languages->destination->from == $file->languages->destination->to) {
                $n_response = $o_response;
            } else {
                $n_response = tapi($o_response, $file->languages->destination->from, $file->languages->destination->to);
            }

            array_push($destination, [
                "trigger" => $n_trigger,
                "responses" => [ $n_response ],
                "type" => $s_entry->type
            ]);
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
        $p++;
    }

    file_put_contents($file->file->to, json_encode($destination, JSON_PRETTY_PRINT));
}

printf(" > Everything's done!");