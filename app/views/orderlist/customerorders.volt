
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

        <td> <?php echo $this->tag->linkTo($this->dispatcher->getParam("language")."/orders/delete/".$row->getOrderCode(), "Delete") ?> </td>
    </tr>

    {% endfor %}
    </table>
 </div>

<nav>
  <ul class="pager">
    <li><a href="#" onclick="updateCustomerPage(1)">First</a></li>
    <li><a href="#" onclick="updateCustomerPage({{customerPage.before}})">Previous</a></li>
    <li><a href="#" onclick="updateCustomerPage({{customerPage.next}})">Next</a></li>
    <li><a href="#" onclick="updateCustomerPage({{customerPage.last}})">Last</a></li>
    <li>  <?php echo $customerPage->current, "/", $customerPage->total_pages ?></li>
  </ul>
</nav>

