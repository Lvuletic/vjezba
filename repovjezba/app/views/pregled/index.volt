
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
        <td>{{ order.customer }}</td>
        <td>{{ order.address }}</td>
        <td>{{ order.totalPrice }}</td>
        <td>{{ order.date }}</td>
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
        <th>Naziv artikla</th>
        <th>Cijena</th>
        <th>Kolicina</th>
        <th>Ukupna cijena</th>
    </tr>

    {% for item in orderItems %}
    <tr>
        <td> {{ item.orderItem.orderCode }} </td>
        <td> {{ item.orderItem.productCode }} </td>
        <td> {{ item.name }} </td>
        <td> {{ item.orderItem.price }} </td>
        <td> {{ item.orderItem.quantity }} </td>
        <td> {{ item.orderItem.totalPrice }} </td>
    </tr>
    {% endfor %}
</table>
</div>
