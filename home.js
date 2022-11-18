$("#btnObrisi").click(function () {
    const checked = $("input[type=radio]:checked");
    request = $.ajax({
        url: "handler/obrisi.php",
        type: "post",
        data: { proizvodID: checked.val() },
    });
    request.done(function (response, textStatus, jqXHR) {
        if (response === "Success") {
            checked.closest("tr").remove();
            console.log("Proizvod je obrisan ");
            alert("Proizvod je obrisan");
        } else {
            console.log("Proizvod nije obrisan " + response);
            alert("Proizvod nije obrisan");
        }
    });
});

$("#formaDodaj").submit(function () {
    event.preventDefault();
  
    let $forma = $("#formaDodaj");
    let $polja = $forma.find("input, select");
    let serijalizovanProizvod = $forma.serialize();

    let jsonPodaci = $forma.serializeArray().reduce(function (json, { name, value }) {
        json[name] = value;
        return json;
    }, {});

    $polja[0].value='1';
    $polja[1].value='1';
    $polja[2].value="";
    $polja[3].value="";
    $("#modalDodaj").modal("toggle");
  
    request = $.ajax({
        url: "handler/dodaj.php",
        type: "post",
        data: serijalizovanProizvod,
    });
  
    request.done(function (response, textStatus, jqXHR) {
        if (response === "Success") {
            alert("Proizvod je dodat");
            dodajRed(jsonPodaci);
        } else {
            console.log("Proizvod nije dodat " + response);
        }
    });
  
    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error("The following error occurred: " + textStatus, errorThrown);
    });
});

function dodajRed(red) {

    const oems = [];
    oems.push('EVGA', 'Gigabyte', 'Sapphire', 'MSI', 'ASUS', 'ASRock');
    const designers = [];
    designers.push('AMD', 'Intel', 'Nvidia');
  
    $.get("handler/uzmiPoslednji.php", function (p) {
      console.log($("#tblProizvodi tbody tr:last").get());
      $("#tblProizvodi tbody").append(`
        <tr>
            <td>${p}</td>
            <td>${oems[red.oemid-1]}</td>
            <td>${designers[red.designerid-1]}</td>
            <td>${red.model}</td>
            <td>${red.cena}€</td>
            <td>
                <label class="custom-radio-btn">
                    <input type="radio" name="checked-donut" value=${p}>
                    <span class="checkmark"></span>
                </label>
            </td>
        </tr>
        `);
    });
};