<?php
    $host = "localhost";
    $db = "gpu_prodavnica";
    $username = "root";
    $password = "";

    $conn = new mysqli($host, $username, $password, $db);

    if($conn->connect_errno){
        exit("Greška pri konektovanju sa bazom!");
    }
?>