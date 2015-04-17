<div id="scroll">

<table id="narudzbe" class="table table-bordered" width="100%">
    <tr>
        <th>Sifra</th>
        <th>Adresa dostave</th>
        <th>Ukupna cijena</th>
        <th>Datum</th>
    </tr>
    {% for row in customerPage.items %}
    <tr>

        <td>{{ row.getOrderCode() }}</td>
        <td>{{ row.getAddressDelivery() }}</td>
        <td>{{ row.getTotalPrice() }}</td>
        <td>{{ row.getDate() }}</td>

    </tr>

    {% endfor %}
    </table>
 </div>