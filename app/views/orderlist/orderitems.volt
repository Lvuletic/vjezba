
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
