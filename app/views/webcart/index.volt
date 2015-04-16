<html>
{{ content() }}
<head>
</head>

<body>
<?php echo $t->_("webshop") ?>

<div class="row">
<br>

<div id="shoplist" class="col-md-8">
{% for product in productPage.items%}
<button type="button" class="btn btn-default btn-lg" onclick="addTable()">
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

<div class="col-md-4">
{{ form("orders/create", "role": "form") }}
{{ formWebCart.label("webcart") }}
<br>
{{ formWebCart.render("webcart") }}
<br>
{{ tag_html("button", ["type": "button", "onclick": "removeProduct()"], false, true, true) }}
Remove product
{{ tag_html_close("button") }}
<br>



<table id="webcartTable" border="1">
    <tr>
        <th>Proizvod</th>
        <th>Količina</th>
        <th>Cijena</th>

    </tr>


        </div>
    </tr>


    </table>

{{ submit_button("name": "create", "value": "Save order", "onclick": "selectAll()") }}

{{ end_form() }}
</div>
</div>
</body>
</html>


