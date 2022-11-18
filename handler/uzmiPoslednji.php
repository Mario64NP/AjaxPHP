<?php
require "../DatabaseBroker.php";
require "../model/Proizvod.php";

$rezultat = Proizvod::vratiPoslednjiProizvod($conn);
if ($rezultat) {
    echo $rezultat->fetch_column();
} else {
    echo 'Failed';
}
?>