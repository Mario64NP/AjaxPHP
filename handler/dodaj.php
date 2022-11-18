<?php
require "../DatabaseBroker.php";
require "../model/Proizvod.php";

if (isset($_POST['oemid']) && isset($_POST['designerid']) && isset($_POST['model']) && isset($_POST['cena'])) {
    $rezultat = Proizvod::dodajProizvod($_POST['oemid'], $_POST['designerid'], $_POST['model'], $_POST['cena'], $conn);
    if ($rezultat) {
        echo 'Success';
    } else {
        echo 'Failed';
    }
} else
echo 'Failed';
?>