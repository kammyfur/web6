<?php

global $_MPRJ_TM_DATABASE;
$_MPRJ_TM_DATABASE = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/db.json"));

class Telemetry {
    public static function set(string $_SEL_KEY, int $_SEL_VALUE) {
        // global $_MPRJ_TM_DATABASE;

        // $matched = false;
        // $index = 0;
        // foreach ($_MPRJ_TM_DATABASE->keys as $key) {
        //     global $_SEL_OBJ;
        //     if (is_object($key)) {
        //         if ($key->name == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     } else {
        //         if ($key['name'] == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     }
        //     $index++;
        // }
        // if ($matched) {
        //     if (is_object($_MPRJ_TM_DATABASE->keys[$_SEL_OBJ])) {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value = $_SEL_VALUE;
        //     } else {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] = $_SEL_VALUE;
        //     }
        // } else {
        //     array_push($_MPRJ_TM_DATABASE->keys, [
        //         "name" => $_SEL_KEY,
        //         "value" => $_SEL_VALUE
        //     ]);
        // }

        // file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/website.json", json_encode($_MPRJ_TM_DATABASE, JSON_PRETTY_PRINT));
        die("Use of deprecated function: Telemetry::set()");
    }

    public static function get(string $_SEL_KEY) {
        // global $_MPRJ_TM_DATABASE;

        // $matched = false;
        // $index = 0;
        // foreach ($_MPRJ_TM_DATABASE->keys as $key) {
        //     global $_SEL_OBJ;
        //     if (is_object($key)) {
        //         if ($key->name == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     } else {
        //         if ($key['name'] == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     }
        //     $index++;
        // }
        // $rval = false;
        // if ($matched) {
        //     if (is_object($_MPRJ_TM_DATABASE->keys[$_SEL_OBJ])) {
        //         $rval = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value;
        //     } else {
        //         $rval = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'];
        //     }
        // } else {
        //     $rval = false;
        // }

        // return $rval;
        die("Use of deprecated function: Telemetry::get()");
    }

    public static function delete(string $_SEL_KEY) {
        // global $_MPRJ_TM_DATABASE;

        // $matched = false;
        // $index = 0;
        // foreach ($_MPRJ_TM_DATABASE->keys as $key) {
        //     global $_SEL_OBJ;
        //     if (is_object($key)) {
        //         if ($key->name == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     } else {
        //         if ($key['name'] == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     }
        //     $index++;
        // }
        // if ($matched) {
        //     array_splice($_MPRJ_TM_DATABASE->keys, $_SEL_OBJ, 1);
        // }

        // file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/website.json", json_encode($_MPRJ_TM_DATABASE, JSON_PRETTY_PRINT));
        die("Use of deprecated function: Telemetry::delete()");
    }

    public static function add(string $_SEL_KEY, int $_SEL_VALUE) {
        // global $_MPRJ_TM_DATABASE;

        // $matched = false;
        // $index = 0;
        // foreach ($_MPRJ_TM_DATABASE->keys as $key) {
        //     global $_SEL_OBJ;
        //     if (is_object($key)) {
        //         if ($key->name == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     } else {
        //         if ($key['name'] == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     }
        //     $index++;
        // }
        // if ($matched) {
        //     if (is_object($_MPRJ_TM_DATABASE->keys[$_SEL_OBJ])) {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value + $_SEL_VALUE;
        //     } else {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] + $_SEL_VALUE;
        //     }
        // } else {
        //     array_push($_MPRJ_TM_DATABASE->keys, [
        //         "name" => $_SEL_KEY,
        //         "value" => $_SEL_VALUE
        //     ]);
        // }

        // file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/website.json", json_encode($_MPRJ_TM_DATABASE, JSON_PRETTY_PRINT));
        die("Use of deprecated function: Telemetry::add()");
    }

    public static function addbigger(string $_SEL_KEY, float $_SEL_VALUE) {
        // global $_MPRJ_TM_DATABASE;

        // $matched = false;
        // $index = 0;
        // foreach ($_MPRJ_TM_DATABASE->keys as $key) {
        //     global $_SEL_OBJ;
        //     if (is_object($key)) {
        //         if ($key->name == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     } else {
        //         if ($key['name'] == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     }
        //     $index++;
        // }
        // if ($matched) {
        //     if (is_object($_MPRJ_TM_DATABASE->keys[$_SEL_OBJ])) {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value + $_SEL_VALUE;
        //     } else {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] + $_SEL_VALUE;
        //     }
        // } else {
        //     array_push($_MPRJ_TM_DATABASE->keys, [
        //         "name" => $_SEL_KEY,
        //         "value" => $_SEL_VALUE
        //     ]);
        // }

        // file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/website.json", json_encode($_MPRJ_TM_DATABASE, JSON_PRETTY_PRINT));
        die("Use of deprecated function: Telemetry::addbigger()");
    }

    public static function multiply(string $_SEL_KEY, int $_SEL_VALUE) {
        // global $_MPRJ_TM_DATABASE;

        // $matched = false;
        // $index = 0;
        // foreach ($_MPRJ_TM_DATABASE->keys as $key) {
        //     global $_SEL_OBJ;
        //     if (is_object($key)) {
        //         if ($key->name == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     } else {
        //         if ($key['name'] == $_SEL_KEY) {
        //             $_SEL_OBJ = $index;
        //             $matched = true;
        //         }
        //     }
        //     $index++;
        // }
        // if ($matched) {
        //     if (is_object($_MPRJ_TM_DATABASE->keys[$_SEL_OBJ])) {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]->value * $_SEL_VALUE;
        //     } else {
        //         $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] = $_MPRJ_TM_DATABASE->keys[$_SEL_OBJ]['value'] * $_SEL_VALUE;
        //     }
        // } else {
        //     array_push($_MPRJ_TM_DATABASE->keys, [
        //         "name" => $_SEL_KEY,
        //         "value" => $_SEL_VALUE
        //     ]);
        // }

        // file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/website.json", json_encode($_MPRJ_TM_DATABASE, JSON_PRETTY_PRINT));
        die("Use of deprecated function: Telemetry::multiply()");
    }

    public static function increment(string $_SEL_SITE, int $_SEL_VALUE) {
        global $_MPRJ_TM_DATABASE;

        $_MPRJ_TM_DATABASE += $_SEL_VALUE;

        file_put_contents($_SERVER['DOCUMENT_ROOT'] . "/telemetry/db.json", json_encode($_MPRJ_TM_DATABASE, JSON_PRETTY_PRINT));
    }
}
