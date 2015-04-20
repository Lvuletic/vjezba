    <div id="scroll">
<table class="table table-bordered" width="100%">
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

        <td>{{ row.orders.getOrderCode() }}</td>
        <td>{{ row.orders.getCustomerId() }}</td>
        <td>{{ row.username }}</td>
        <td>{{ row.orders.getAddressDelivery() }}</td>
        <td>{{ row.orders.getTotalPrice() }}</td>
        <td>{{ row.orders.getDate() }}</td>

        <td> <?php if ($this->session->get("user_id") == $row->orders->getCustomerId() || $this->session->get("user_id") == 1)
        echo $this->tag->linkTo($this->session->get("lang")."/orderlist/edit/".$row->orders->getOrderCode(), "Edit") ?> </td>

        <td> <?php if ($this->session->get("user_id") == 1)
        echo $this->tag->linkTo($this->session->get("lang")."/orders/delete/".$row->orders->getOrderCode(), "Delete") ?> </td>


    </tr>

    {% endfor %}
    </table>
</div>
<div id="links">


<tr>
<td> <a href="#" onclick="updatePage(1)"> First </a>
<td> <a href="#" onclick="updatePage({{ordersPage.before}})"> Previous </a>
<td> <a href="#" onclick="updatePage({{ordersPage.next}})"> Next </a>
<td> <a href="#" onclick="updatePage({{ordersPage.last}})"> Last </a>
<td><?php echo $ordersPage->current, "/", $ordersPage->total_pages ?></td>
</tr>


</div>