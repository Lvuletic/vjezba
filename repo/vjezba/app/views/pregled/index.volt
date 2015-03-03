
<div id="scroll">
<table id="narudzbe" border="1">
    <tr>
        <th>Sifra</th>
        <th>Ime kupca</th>
        <th>Adresa dostave</th>
        <th>Ukupna cijena</th>
        <th>Datum</th>
    </tr>
    {% for narudzba in pageN.items %}
    <tr>
        <td>{{ narudzba.sifra_N }}</td>
        <td>{{ narudzba.ime_kupca }}</td>
        <td>{{ narudzba.adresa_dostava }}</td>
        <td>{{ narudzba.ukupna_cijena }}</td>
        <td>{{ narudzba.datum }}</td>
    </tr>
    {% endfor %}
</table>
</div>

<div>
    <?php
    echo Phalcon\Tag::form("pregled/index");
    echo Phalcon\Tag::textField(array(
        "name" => "sifra",
        "id" => "odabir",
        "size" => 10
    ));
    echo Phalcon\Tag::submitButton(array(
        "name" => "prikazi",
        "id" => "prikaziStavke"
    ))
    ?>
    </form>
</div>

<div>
<table>
    <tr>
        <th>Sifra stavke</th>
        <th>Sifra artikla</th>
        <th>Cijena</th>
    </tr>
    {% for stavka in pageS.items %}
    <tr>
        <td> {{ stavka.sifraStavke }} </td>
        <td> {{ stavka.sifraArtikla }} </td>
        <td> {{ stavka.ukupnaCijena }} </td>
    </tr>
    {% endfor %}
</table>
</div>

