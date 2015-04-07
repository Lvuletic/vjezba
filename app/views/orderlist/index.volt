{{ content() }}

<html>
<head> {{ assets.outputCss() }} </head>
<body>
<div id = "whole">
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
        <td>{{ row.orders.getOrderCode() }}</td>
        <td>{{ row.orders.getCustomerId() }}</td>
        <td>{{ row.username }}</td>
        <td>{{ row.orders.getAddressDelivery() }}</td>
        <td>{{ row.orders.getTotalPrice() }}</td>
        <td>{{ row.orders.getDate() }}</td>
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
{#
<div>
    {{ form("orderlist/index", "role": "form") }}
    {{ form.label("code") }}
    {{ form.render("code") }}
    {{ submit_button("name": "showOrderItems", "value": "Show items", "id": "showOrderItems") }}
    {{ end_form() }}
</div>
#}
<?php echo $t->_("items") ?>

<div id="scroll2">

</div>

</div>
{{ assets.outputJs() }}
</body>
</html>
