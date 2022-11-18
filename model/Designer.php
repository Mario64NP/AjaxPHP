<?php

class Designer {

    public $id;
    public $name;
    public $website;

    public static function vratiSveBrendove(mysqli $conn) {
        $cmd = "SELECT * FROM Designer";
        return $conn->query($cmd);
    }

}
?>