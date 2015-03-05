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
{{ formK.label("kosarica") }}
<br>
{{ formK.render("kosarica") }}
<br>
{{ tag_html("button", ["type": "button", "value": "Makni artikal", "onclick": "removeArtikal()"], false, true, true) }}
Makni artikal
{{ tag_html_close("button") }}
<br><br>
{{ formK.label("customer") }}
{{ formK.render("customer") }}
<br>
{{ formK.label("address") }}
{{ formK.render("address") }}
<br>
{{ submit_button("name": "create", "value": "Spremi narudžbu", "onclick": "selectAll()") }}

{{ end_form() }}
</form>


