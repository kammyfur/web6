<?php
class AdGenerator {
    private function getTypesList(string $language) {
        $f = scandir("../static/{$language}");
        $rf = [];
        foreach ($f as $sf) {
            if ($sf == "." || $sf == ".." || $sf == ".htaccess") {} else {
                array_push($rf, $sf);
            }
        }
        return $rf;
    }
    private function getIdsList(string $language, string $format) {
        $f = scandir("../static/{$language}/{$format}");
        $rf = [];
        foreach ($f as $sf) {
            if ($sf == "." || $sf == ".." || $sf == ".htaccess") {} else {
                array_push($rf, $sf);
            }
        }
        return $rf;
    }
    private function getRandomId($ids) {
        $nid = [];
        foreach ($ids as $id) {
            array_push($nid, explode(".", $id)[0]);
        }
        return $nid[rand(0, count($nid) - 1)];
    }
    private function getAdPath($language, $format, $id) {
        return getcwd() . "/../static/{$language}/{$format}/{$id}.jpg";
    }
    private function getRawImageContent($path) {
        $fc = file_get_contents($path);
        return $fc;
    }
    public function generateAd(string $language, string $format) {
        if (file_exists("../static/{$language}")) {
            $types = AdGenerator::getTypesList($language);
            // var_dump($types);
            if (isset($types[array_search($format, $types)])) {
                $ids = AdGenerator::getIdsList($language, $format);
                // var_dump($ids);
                $fid = AdGenerator::getRandomId($ids);
                // var_dump($fid);
                $path = AdGenerator::getAdPath($language, $format, $fid);
                // var_dump($path);
                header("Content-Type: image/jpeg");
                echo(AdGenerator::getRawImageContent($path));
            } else {
                die("Invalid format: {$format}");
            }
        } else {
            die("Invalid language: {$language}");
        }
    }
}