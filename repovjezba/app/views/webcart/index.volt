{{ content() }}

<div>
    {{ form("webcart/index", "role": "form") }}
    {{ formProduct.label("product") }}
    <br>
    {{ formProduct.render("product") }}
    {{ end_form() }}
</div>


{{ submit_button("name": "add", "value": "Dodaj artikal", "id": "addArtikal", "onclick": "addArtikal()") }}
<br><br>
{{ form("orders/create", "role": "form") }}
{{ formWebCart.label("webcart") }}
<br>
{{ formWebCart.render("webcart") }}
<br>
{{ tag_html("button", ["type": "button", "value": "Makni artikal", "onclick": "removeArtikal()"], false, true, true) }}
Makni artikal
{{ tag_html_close("button") }}
<br>
<br>
{{ submit_button("name": "create", "value": "Spremi narudžbu", "onclick": "selectAll()") }}

{{ end_form() }}
</form>


