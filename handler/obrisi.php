<?php
require "../DatabaseBroker.php";
require "../model/Proizvod.php";

if(isset($_POST['proizvodID'])){
    $rezultat = Proizvod::obrisiProizvod($_POST['proizvodID'], $conn);
    if($rezultat){
        echo 'Success';
    }else{
        echo 'Failed';
    }
}
?>