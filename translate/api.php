<?php

header("Content-Type: application/json");

function finish() {
    global $obj;
    die(json_encode($obj, JSON_PRETTY_PRINT));
}

$obj = ["error" => null, "results" => []];

if (isset($_GET['from'])) {
    if (strpos($_GET['from'], "..") !== false || strpos($_GET['from'], "/") !== false) {
        $obj["error"] = "Nice try! Stop trying to exploit our system...";
        finish();
    } else {
        $from = $_GET['from'];
    }
} else {
    $obj["error"] = "No 'from' argument";
    finish();
}

if (!isset($_GET['lang'])) {
    $obj["error"] = "No 'lang' argument";
    finish();
}

$_LANGUAGE = $_GET['lang'];
if ($_LANGUAGE == "fr") {
    $lang = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/static/i18n/fr.json"));
} else {
    $lang = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/static/i18n/en.json"));
}

if (isset($_GET['to'])) {
    if (strpos($_GET['to'], "..") !== false || strpos($_GET['from'], "/") !== false) {
        $obj["error"] = "Nice try! Stop trying to exploit our system...";
        finish();
    } else {
        $to = $_GET['to'];
    }
} else {
    $obj["error"] = "No 'to' argument";
    finish();
}

if (isset($_POST['text'])) {
    if (strlen($_POST['text']) > 1000) {
        $obj["error"] = "Max text limit reached";
        finish();
    } else {
        $text = $_POST['text'];
    }
} else {
    $obj["error"] = "No 'text' POST data";
    finish();
}

if (!file_exists("./dict/" . $from . "-" . $to . ".json")) {
    $obj["error"] = "No such dictionary";
    finish();
}

$data = json_decode(file_get_contents("./dict/" . $from . "-" . $to . ".json"));

$words = explode(" ", str_replace("'", "", $text));

foreach ($words as $word) {
    if (trim($word) != "") {
        $word = preg_replace("/\p{P}/u", "", $word);
        $match = false;
        foreach ($data as $el) {
            if (ucwords($el->trigger) == ucwords($word)) {
                $o = ["original" => ucwords($word), "responses" => [], "htmltype" => ""];
                foreach ($el->responses as $response) {
                    array_push($o["responses"], ucwords($response));
                }

                switch ($el->type) {
                    case 'noun':
                        $o["htmltype"] = '<span class="word-n">' . $lang->translate->types[0] . '</span>';
                        break;

                    case 'verb':
                        $o["htmltype"] = '<span class="word-v">' . $lang->translate->types[1] . '</span>';
                        break;

                    case 'adverb':
                        $o["htmltype"] = '<span class="word-a1">' . $lang->translate->types[3] . '</span>';
                        break;

                    case 'adjective':
                        $o["htmltype"] = '<span class="word-a2">' . $lang->translate->types[2] . '</span>';
                        break;

                    case 'pronoun':
                        $o["htmltype"] = '<span class="word-p">' . $lang->translate->types[5] . '</span>';
                        break;

                    case 'determinant':
                        $o["htmltype"] = '<span class="word-d">' . $lang->translate->types[4] . '</span>';
                        break;

                    case 'vulgar':
                        $o["htmltype"] = '<span class="word-vu">' . $lang->translate->types[6] . '</span>';
                        break;

                    case 'familiar':
                        $o["htmltype"] = '<span class="word-f">' . $lang->translate->types[7] . '</span>';
                        break;

                    case 'respect':
                        $o["htmltype"] = '<span class="word-s">' . $lang->translate->types[8] . '</span>';
                        break;

                    default:
                        $o["htmltype"] = '<span class="word-o">' . $lang->translate->types[9] . '</span>';
                        break;
                }

                if ((isset($el->approved) && $el->approved) || $o["htmltype"] != '<span class="word-o">' . $lang->translate->types[9] . '</span>') {
                    $o["approved"] = true;
                } else {
                    $o["approved"] = false;
                }

                array_push($obj["results"], $o);
                $match = true;
            }
        }

        if (!$match) {
            array_push($obj["results"], ["original" => ucwords($word), "responses" => [ucwords($word)], "htmltype" => '<span class="word-u">' . $lang->translate->types[10] . '</span>']);
        }
    }
}

finish();