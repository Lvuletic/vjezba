{{ content() }}
<html>
<head> {{ assets.outputCss() }} </head>
<body>
<?php echo $t->_("checkout") ?>
<div id="scroll">

<table id="narudzbe" border="1">
    <tr>
        <th>Sifra</th>
        <th>Sifra kupca</th>
        <th>Ime kupca</th>
        <th>Adresa dostave</th>
        <th>Ukupna cijena</th>
        <th>Datum</th>
    </tr>
    {% for row in ordersPage.items %}
    <tr>
        <div id="results">
        <td>{{ row.getOrderCode() }}</td>
        <td>{{ row.getCustomerId() }}</td>
        <td></td>
        <td>{{ row.getAddressDelivery() }}</td>
        <td>{{ row.getTotalPrice() }}</td>
        <td>{{ row.getDate() }}</td>
        </div>
    </tr>
    {% endfor %}
    </table>
<table>

<tr>
<td> <a href="#" onclick="updatePage(1)"> First </a>
<td> <a href="#" onclick="updatePage({{ordersPage.before}})"> Previous </a>
<td> <a href="#" onclick="updatePage({{ordersPage.next}})"> Next </a>
<td> <a href="#" onclick="updatePage({{ordersPage.last}})"> Last </a>
<td><?php echo $ordersPage->current, "/", $ordersPage->total_pages ?></td>
</tr>

</table>

</div>


<div>
    {{ form("orderlist/index", "role": "form") }}
    {{ form.label("code") }}
    {{ form.render("code") }}
    {{ submit_button("name": "showOrderItems", "value": "Show items", "id": "showOrderItems") }}
    {{ end_form() }}
</div>
<?php echo $t->_("items") ?>
<div id="scroll2">
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
{{ assets.outputJs() }}
</body>
</html>
