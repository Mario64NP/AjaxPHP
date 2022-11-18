<?php
require "DatabaseBroker.php";
require "model/Proizvod.php";
require "model/Designer.php";
require "model/Oem.php";

session_start();

if (empty($_SESSION['id']) || $_SESSION['id'] == '') {
    header("Location: index.php");
}

$proizvodi = Proizvod::vratiSveProizvode($conn);
$brlist = Designer::vratiSveBrendove($conn);
$oemlist = Oem::vratiSveProizvodjace($conn);

$brendovi = array();
while($row = $brlist->fetch_assoc()) {
    array_push($brendovi, $row['name']);
}

$proizvodjaci = array();
while($row = $oemlist->fetch_assoc()) {
    array_push($proizvodjaci, $row['name']);
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="icon" href="resources/favicon.ico">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>GPU prodavnica ponuda</title>
    </head>
    <body>
        <h1 id="title">Proizvodi u ponudi</h1>
        <table class="tabela-proizvodi" id="tblProizvodi">
            <thead>
                <tr>
                    <th>R.B.</th>
                    <th>Proizvođač</th>
                    <th>Brend</th>
                    <th>Model</th>
                    <th>Cena</th>
                    <th>Izaberi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($proizvod = $proizvodi->fetch_array()) { ?>
                    <tr id="tr-<?php echo $proizvod[0] ?>">
                        <td><?php echo $proizvod[0] ?></td>
                        <td><?php echo $proizvodjaci[$proizvod[1]-1] ?></td>
                        <td><?php echo $brendovi[$proizvod[2]-1] ?></td>
                        <td><?php echo $proizvod[3] ?></td>
                        <td><?php echo $proizvod[4] ?>€</td>
                        <td>
                            <label class="radio-btn">
                                <input type="radio" name="checked-donut" value=<?php echo $proizvod[0] ?>>
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <div class="dugmad">
            <button id="btnDodaj" class="button-dodaj" type="button" data-toggle="modal" data-target="#modalDodaj">Dodaj ➕</button>
            <button id="btnObrisi" class="button-obrisi" type="button">Obriši ➖</button>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalDodaj" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Dodaj proizvod</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="formaDodaj">
                        <div>
                            <label for="oems">Proizvođač:</label>
                            <select name="oemid" id="oems">
                                <option value="1">EVGA</option>
                                <option value="2">Gigabyte</option>
                                <option value="3">Sapphire</option>
                                <option value="4">MSI</option>
                                <option value="5">ASUS</option>
                                <option value="6">ASRock</option>
                            </select>
                        </div>
                        <div>
                            <label for="brend">Brend:</label>
                            <select name="designerid" id="brend">
                                <option value="1">AMD</option>
                                <option value="2">Intel</option>
                                <option value="3">Nvidia</option>
                            </select>
                        </div>
                        <div>
                            <label for="model">Model:</label>
                            <input type="text" name="model" class="form-control">
                        </div>
                        <div>
                            <label for="cena">Cena:</label>
                            <input type="text" name="cena" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="btnDodaj" type="submit" class="btn btn-success" form="formaDodaj">Potvrdi</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Otkaži</button>
                </div>
            </div>
            
            </div>
        </div>
        <script src="home.js"></script>
    </body>
</html>