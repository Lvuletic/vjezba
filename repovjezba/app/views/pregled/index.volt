
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
        <td>{{ order.getOrderCode() }}</td>
        <td>{{ order.getCustomer() }}</td>
        <td>{{ order.getAddressDelivery() }}</td>
        <td>{{ order.getTotalPrice() }}</td>
        <td>{{ order.getDate() }}</td>
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
        <td> {{ item.orderItem.getOrderCode() }} </td>
        <td> {{ item.orderItem.getProductCode() }} </td>
        <td> {{ item.name }} </td>
        <td> {{ item.orderItem.getPrice() }} </td>
        <td> {{ item.orderItem.getQuantity() }} </td>
        <td> {{ item.orderItem.getTotalPrice() }} </td>
    </tr>
    {% endfor %}
</table>
</div>
