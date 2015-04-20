{{ content() }}

<html>
<head>
</head>
<body>

<div id = "whole">

<?php echo $t->_("yourorders"), $this->session->get("username") ?>
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





  <tr>
    <td> <a href="#" onclick="updateCustomerPage(1)"> First </a> </td>
    <td> <a href="#" onclick="updateCustomerPage({{customerPage.before}})"> Previous </a> </td>
    <td> <a href="#" onclick="updateCustomerPage({{customerPage.next}})"> Next </a> </td>
    <td> <a href="#" onclick="updateCustomerPage({{customerPage.last}})"> Last </a> </td>
    <td> <?php echo $customerPage->current, "/", $customerPage->total_pages ?> </td>
  </tr>


</div>

<?php echo $t->_("items") ?>
<div id="orderDetails">

</div>


</body>
</html>
