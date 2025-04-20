<?php

require "tapi.php";
printf(" > Automagic! Takes out words from text file and translate them\n");

printf(" > Reading config...\n");
$config = json_decode(file_get_contents("./translate.config.json"));
printf(" > So, I will be reading « " . $config->files->from . " » which is in « " . $config->languages->from . " », translate it in « " . $config->languages->to . " » and put that in « " . $config->files->to . " ».\n");

printf(" > Let's first get an array of all our words\n");
$text = preg_replace('!\s+!', ' ', file_get_contents($config->files->from));
$words = explode(" ", ucwords(str_replace("'", " ", preg_replace("/\p{P}/u", "", $text))));
file_put_contents($config->files->from .  ".amw", " - " . implode("\n - ", $words));
printf(" > Alright, I got " . count($words) . " words out of « " . $config->files->from .  " », they've got dumped into « " . $config->files->from .  ".amw »\n");

printf(" > Let's get this straight, I will right now request Google Translate, Yandex.Translate, Bing Translate, or Translate.com (depending on availabilities) « how is 'this' in 'this language'? » and pop the answer in « " . $config->files->to . " » in a format that can be used by pTranslate\n");

$obj = [];
$p = 1;
$t = count($words);
$r = count($words);
global $avgstr;
global $avg;
$avgstr = "0ms";
$avg = 0;
foreach ($words as $word) {
    $a = ["trigger" => $word, "responses" => [], "type" => "other"];

    if (trim($word) != "") {
        echo(" > " . $p . "/" . $t . " (" . number_format(($p/$t)*100, 2, '.', '') . "%, " . $avgstr . ") : " . $word . "\n");
        $ot = new DateTime( 'now' );
        $fres = tapi($word, $config->languages->from, $config->languages->to);
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
    } else {
        echo(" > " . $p . "/" . $t . " (" . number_format(($p/$t)*100, 2, '.', '') . "%, " . $avgstr . ") : <empty trigger>\n");
    }

    array_push($a["responses"], $fres);
    array_push($obj, $a);
    file_put_contents($config->files->to, json_encode($obj, JSON_PRETTY_PRINT));

    $p++;
    $r--;
}

printf(" > Looks pretty fine, I finished everything! Your ready-to-go file is at « " . $config->files->to . " »\n");