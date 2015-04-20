<div id="shoplist">
{% for product in productPage.items%}
<div class ="col-md-3">
{{product.getName()}} <br> Cijena - {{product.getPrice()}} kn
<button type="button" class="btn btn-default" onclick="addTable('{{product.getCode()}}','{{product.getName()}}','{{product.getPrice()}}')">
   Dodaj
</button>

</div>
{% endfor %}

<br>

<table class="table table-bordered">
<tr>
<td> <a href="#" onclick="updateWebshopPage(1)"> First </a> </td>
<td> <a href="#" onclick="updateWebshopPage({{productPage.before}})"> Previous </a> </td>
<td> <a href="#" onclick="updateWebshopPage({{productPage.next}})"> Next </a> </td>
<td> <a href="#" onclick="updateWebshopPage({{productPage.last}})"> Last </a> </td>
<td> <?php echo $productPage->current, "/", $productPage->total_pages ?> </td>
</tr>
</table>

</div>