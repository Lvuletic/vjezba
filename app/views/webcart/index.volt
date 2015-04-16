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
<button type="button" class="btn btn-default btn-lg" onclick="addTable('{{product.getCode()}}','{{product.getName()}}','{{product.getPrice()}}')">
  <span class="glyphicon glyphicon-star"></span> {{product.getName()}}
</button>
{% endfor %}

<br>
<a href="#" onclick="updateWebshopPage(1)"> First </a>
<a href="#" onclick="updateWebshopPage({{productPage.before}})"> Previous </a>
<a href="#" onclick="updateWebshopPage({{productPage.next}})"> Next </a>
<a href="#" onclick="updateWebshopPage({{productPage.last}})"> Last </a>
<?php echo $productPage->current, "/", $productPage->total_pages ?>
</div>

<div class="col-md-4">


<div id="data">
<table id="webcartTable" class="table table-bordered table-condensed">
    <thead>
    <tr>
        <th>Kod</th>
        <th>Proizvod</th>
        <th>Količina</th>
        <th>Cijena</th>
        <th>Ukupna cijena</th>

    </tr>
    </thead>
    <tbody>
    <tr id="total">
    <td colspan="4">Ukupna cijena</td>
    <td> 0 </td>
    </tr>
    </tbody>

</table>
</div>
<button type="button" onclick="getTable()">
dodo
</button>


{{ end_form() }}
</div>
</div>

</body>
</html>


