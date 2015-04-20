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


