<?php

Class Proizvod {

    public $ID;
    public $proizvodjac;
    public $brend;
    public $model;
    public $cena;

    public function __construct($ID = null, $proizvodjac = null, $brend = null, $model = null, $cena = null) {
        $this->ID = $ID;
        $this->proizvodjac = $proizvodjac;
        $this->brend = $brend;
        $this->model = $model;
        $this->cena = $cena;
    }
    
    public static function vratiSveProizvode(mysqli $conn) {
        $cmd = "SELECT * FROM Proizvod";
        return $conn->query($cmd);
    }

    public static function vratiPoIDu($id, mysqli $conn) {
        $cmd = "SELECT * FROM proizvod WHERE id = $id";
        return $conn->query($cmd);
    }

    public static function dodajProizvod($oemid, $designerid, $model, $price, mysqli $conn) {
        $cmd = "INSERT INTO proizvod VALUES (NULL, '$oemid', '$designerid', '$model', '$price')";
        return $conn->query($cmd);
    }

    public static function obrisiProizvod($id, mysqli $conn) {
        $cmd = "DELETE FROM proizvod WHERE id = '$id'";
        return $conn->query($cmd);
    }

    public static function vratiPoslednjiProizvod(mysqli $conn) {
        $cmd = "SELECT * FROM proizvod ORDER BY id DESC LIMIT 1";
        return $conn->query($cmd);
    }
}
?>