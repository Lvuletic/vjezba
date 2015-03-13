<html>
{{ content() }}
<head> </head>

<body>
<?php echo $t->_("webshop") ?>
<div>
    {{ form("webcart/index", "role": "form") }}
    {{ formProduct.label("product") }}
    <br>
    {{ formProduct.render("product") }}
    {{ end_form() }}
</div>

{{ submit_button("name": "add", "value": "Add product", "id": "addProduct", "onclick": "addProduct()") }}
<br><br>
{{ form("orders/create", "role": "form") }}
{{ formWebCart.label("webcart") }}
<br>
{{ formWebCart.render("webcart") }}
<br>
{{ tag_html("button", ["type": "button", "onclick": "removeProduct()"], false, true, true) }}
Remove product
{{ tag_html_close("button") }}
<br>
<br>
{{ submit_button("name": "create", "value": "Save order", "onclick": "selectAll()") }}

{{ end_form() }}
</form>
{{ assets.outputJs() }}
</body>
</html>


