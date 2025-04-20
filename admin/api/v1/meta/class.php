<?php
class Polymermin {
    public function validateArgs(array $arguments) {
        foreach ($arguments as $argument) {
            if (isset($_GET[$argument])) {} else {
                die("ArgumentError: " . $argument . " is not defined");
            }
        }
    }
    public function validateData(array $arguments) {
        foreach ($arguments as $argument) {
            if (isset($_POST[$argument])) {} else {
                die("DataError: " . $argument . " is not defined");
            }
        }
    }
}