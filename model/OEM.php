<?php

class OEM {

    public $id;
    public $name;
    public $website;

    public static function vratiSveProizvodjace(mysqli $conn) {
        $cmd = "SELECT * FROM Oem";
        return $conn->query($cmd);
    }

}
?>