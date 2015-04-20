{{ content() }}

<html>
<head>
</head>
<body>

<div id = "whole">

<?php echo $t->_("checkout") ?>
    <div id="scroll">

<table id="narudzbe" class="table table-bordered" width="100%">
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

        <td> <?php if ($this->session->get("user_id") == 1)
        echo $this->tag->linkTo($this->dispatcher->getParam("language")."/orders/delete/".$row->orders->getOrderCode(), "Delete") ?> </td>


    </tr>

    {% endfor %}
    </table>
 </div>

<nav>
  <ul class="pager">
    <li><a href="#" onclick="updatePage(1)">First</a></li>
    <li><a href="#" onclick="updatePage({{ordersPage.before}})">Previous</a></li>
    <li><a href="#" onclick="updatePage({{ordersPage.next}})">Next</a></li>
    <li><a href="#" onclick="updatePage({{ordersPage.last}})">Last</a></li>
    <li>  <?php echo $ordersPage->current, "/", $ordersPage->total_pages ?></li>
  </ul>
</nav>


 </div>



<?php echo $t->_("items") ?>

<div id="orderDetails">

</div>


</body>
</html>
