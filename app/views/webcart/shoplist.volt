<div id="shoplist">
{% for product in productPage.items%}
<button type="button" class="btn btn-default btn-lg" onclick="addTable('{{product.getCode()}}','{{product.getName()}}','{{product.getPrice()}}')">
  <span class="glyphicon glyphicon-star"></span> {{product.getName()}}
</button>
{% endfor %}
<br>
<a href="#" onclick="updateWebshopPage(1)"> First </a>
<a href="#" onclick="updateWebshopPage({{productPage.before}})"> Previous </a>
<a href="#" onclick="updateWebshopPage({{productPage.next}})"> Next </a>
<a href="#" onclick="updateWebshopPage({{productPage.last}})"> Last </a>
<?php echo $productPage->current, "/", $productPage->total_pages ?></td>
</div>