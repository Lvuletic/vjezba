{{ content() }}

<div>
    {{ form("kosarica/index", "role": "form") }}
    {{ form.label("product") }}
    <br>
    {{ form.render("product") }}
    {{ end_form() }}
</div>


{{ submit_button("name": "add", "value": "Dodaj artikal", "id": "addArtikal", "onclick": "addArtikal()") }}
<br><br>
{{ form("Orders/create", "role": "form") }}
{{ form2.label("kosarica") }}
<br>
{{ form2.render("kosarica") }}
<br>
{{ tag_html("button", ["type": "button", "value": "Makni artikal", "onclick": "removeArtikal()"], false, true, true) }}
Makni artikal
{{ tag_html_close("button") }}
<br><br>
{{ form2.label("customer") }}
{{ form2.render("customer") }}
<br>
{{ form2.label("address") }}
{{ form2.render("address") }}
<br>
{{ submit_button("name": "create", "value": "Spremi narudžbu", "onclick": "selectAll()") }}

{{ end_form() }}
</form>


