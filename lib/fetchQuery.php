<?php
set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
    // error was suppressed with the @-operator
    if (0 === error_reporting()) {
        return false;
    }
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
});
if (isset($_GET['q'])) {
    $query = $_GET['q'];
    header("Content-Type: application/json");
} else {
    header("HTTP/1.1 401 No Query");
}
try {
    $content = file_get_contents("https://www.googleapis.com/customsearch/v1?key=AIzaSyAe8ljbBVlaefw-F1RrQDP1S9kC-viHrU4&cx=000823267166030234663:yasonkl4vzw&q=" . $query);
    echo($content);
} catch (Exception $err) {
    try {
        $content = file_get_contents("https://www.googleapis.com/customsearch/v1/siterestrict?key=AIzaSyAe8ljbBVlaefw-F1RrQDP1S9kC-viHrU4&cx=000823267166030234663:yasonkl4vzw&q=" . $query);
        echo($content);
    } catch (Exception $err) {
        header("HTTP/1.1 401 Server Unavailable");
    }
}