
<div id="scroll">
<table id="narudzbe" border="1">
    <tr>
        <th>Sifra</th>
        <th>Ime kupca</th>
        <th>Adresa dostave</th>
        <th>Ukupna cijena</th>
        <th>Datum</th>
    </tr>
    {% for order in ordersPage.items %}
    <tr>
        <td>{{ order.orderCode }}</td>
        <td>{{ order.customerOrder }}</td>
        <td>{{ order.address }}</td>
        <td>{{ order.totalPrice }}</td>
        <td>{{ order.orderDate }}</td>
    </tr>
    {% endfor %}
</table>
</div>

<div>
    {{ form("pregled/index", "role": "form") }}
    {{ form.label("code") }}
    {{ form.render("code") }}
    {{ submit_button("name": "showOrderItems", "value": "Prikazi stavke", "id": "showOrderItems") }}
    {{ end_form() }}
</div>

<div>
<table>
    <tr>
        <th>Sifra narudzbe</th>
        <th>Sifra artikla</th>
        <th>Cijena</th>
        <th>Kolicina</th>
        <th>Ukupna cijena</th>

    </tr>
    {% for orderItem in orderItemPage.items %}
    <tr>
        <td> {{ orderItem.orderCode }} </td>
        <td> {{ orderItem.productCode }} </td>
        <td> {{ orderItem.productPrice }} </td>
        <td> {{ orderItem.itemQuantity }} </td>
        <td> {{ orderItem.totalPrice }} </td>
    </tr>
    {% endfor %}
</table>
</div>

