<?php

function tapi($query, $from, $to, $raw = false) {
    $userAgent = 'Mozilla/5.0 (X11; Linux x86_64; rv:80.0) Gecko/20100101 Firefox/80.0';
    $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $from ."&tl=" . $to ."&dt=t&q=" . urlencode($query);
 
    if ($raw) {
        echo("c:init");
    }
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    curl_setopt($ch, CURLOPT_URL, $url);  
    curl_setopt($ch, CURLOPT_HEADER, 0);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    if ($raw) {
        echo("c:exec");
    }
    $output = curl_exec($ch);
    if ($raw) {
        var_dump($output);
        echo("c:close");
    }
    if ($raw) {
        curl_close($ch);
        echo("c:out");
    }
    if (json_decode($output) == null) {
        $userAgent = 'Mozilla/5.0 (X11; Linux x86_64; rv:80.0) Gecko/20100101 Firefox/80.0';
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" . $from ."&tl=" . $to ."&dt=t&q=" . urlencode($query);
        $apikey = "trnsl.1.1.20200518T204709Z.acb2d1223aca34df.5319a2200327fd86d082ade1d729cc1a756e88fc";
        $url = "https://translate.yandex.net/api/v1.5/tr.json/translate?key=" . $apikey . "&lang=" . $from . "-" . $to . "&text=" . urlencode($query);

        if ($raw) {
            echo("c:init");
        }
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);  
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        if ($raw) {
            echo("c:exec");
        }
        $output = curl_exec($ch);
        if ($raw) {
            var_dump($output);
            echo("c:close");
        }
        if ($raw) {
            curl_close($ch);
            echo("c:out");
        }

        if (json_decode($output) !== null && isset($output->text)) {
            echo(" > Translation source : Yandex.Translate (public)\n");
            if ($raw) {
                return json_decode($output);
            } else {
                return json_decode($output)->text[0];
            }
        } else {
            $ch = curl_init();

            $userAgent = 'Mozilla/5.0 (X11; Linux x86_64; rv:80.0) Gecko/20100101 Firefox/80.0';
            curl_setopt($ch, CURLOPT_URL,"https://www.translate.com/translator/ajax_translate");
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                'text_to_translate' => $query,
                'source_lang' => $from,
                'translated_lang' => $to,
                'use_cache_only' => 'false'
            )));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close ($ch);

            $output = json_decode($server_output);
            if (isset($output) && isset($output->result) && $output->result == "success") {
                echo(" > Translation source : Translate.com (public)\n");
                if ($raw) {
                    return $output;
                } else {
                    return $output->translated_text;
                }
            } else {
                $ch = curl_init();

            $userAgent = 'Mozilla/5.0 (X11; Linux x86_64; rv:80.0) Gecko/20100101 Firefox/80.0';
            curl_setopt($ch, CURLOPT_URL,"https://translate.yandex.net/api/v1/tr.json/translate?id=55933c3a.5f2758ca.93b79f4b.74722d74657874-1-0&srv=tr-text&lang=" . $from . "-" . $to . "&reason=auto&format=text");
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                'text' => $query,
                'options' => '4'
            )));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close ($ch);

            $output = json_decode($server_output);
            if (isset($output) && isset($output->code) && $output->code == 200 && isset($output->text) && is_array($output->text) && count($output->text) == 1) {
                echo(" > Translation source : Yandex.Translate (private)\n");
                if ($raw) {
                    return $output;
                } else {
                    return $output->text;
                }
            } else {
                $ch = curl_init();

            $userAgent = 'Mozilla/5.0 (X11; Linux x86_64; rv:80.0) Gecko/20100101 Firefox/80.0';
            curl_setopt($ch, CURLOPT_URL,"https://www.bing.com/tlookupv3?isVertical=1&=&IG=96AD43B184084A92891027EEC72B46E3&IID=translator.5026.2");
            curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
            curl_setopt($ch, CURLOPT_POST, 1);

            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                'from' => $from,
                'to' => $to,
                'text' => $query
            )));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $server_output = curl_exec($ch);
            curl_close ($ch);

            $output = json_decode($server_output);
            if (isset($output) && is_array($output) && isset($output->translations) && is_array($output->translations) && isset($output->translations[0]) && is_object($output->translations[0]) && isset($output->translations[0]->normalizedTarget) && is_string($output->translations[0]->normalizedTarget)) {
                echo(" > Translation source : Bing Translate (private)\n");
                if ($raw) {
                    return $output;
                } else {
                    return $output->translations[0]->normalizedTarget;
                }
            } else {
                echo(" > [" . date("H:i:s") . "] Unable to link to translation service, retrying\n");
                tapi($query, $from, $to, $raw);
            }
            }
            }
        }
    } else {
        sleep(1.5);
        echo(" > Translation source : Google Translate (private)\n");
        if ($raw) {
            return json_decode($output);
        } else {
            return json_decode($output)[0][0][0];
        }
    }
}