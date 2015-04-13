{{ content() }}
{{ link_to(["for":"orderstable","language":this.session.get("lang")],"povratak") }}
<div>
    {{ form(this.session.get("lang")~"/orderlist/edit", "role": "form") }}
    {{ formOrderEdit.label("orderCode") }}
    <br>
    {{ formOrderEdit.render("orderCode") }}
    <br>
    {{ formOrderEdit.label("customerId") }}
    <br>
    {{ formOrderEdit.render("customerId") }}
    <br>
    {{ formOrderEdit.label("address") }}
    <br>
    {{ formOrderEdit.render("address") }}
    <br>
    {{ formOrderEdit.label("totalPrice") }}
    <br>
    {{ formOrderEdit.render("totalPrice") }}
    <br>
    {{ formOrderEdit.label("date") }}
    <br>
    {{ formOrderEdit.render("date") }}
    <br>
    {{ submit_button("value": "Save changes") }}
    {{ end_form() }}
</div>
