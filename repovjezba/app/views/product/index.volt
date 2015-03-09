{{ content() }}
<div>
    {{ form("product/create", "role": "form") }}
    {{ form.label("name") }}
    <br>
    {{ form.render("name") }}
    <br>
    {{ form.label("price") }}
    <br>
    {{ form.render("price") }}
    <br>
    {{ form.label("type") }}
    <br>
    {{ form.render("type") }}
    {{ submit_button("value": "Login") }}
    {{ end_form() }}
</div>