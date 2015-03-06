{{ content() }}
<div>
    {{ form("user/save", "role": "form") }}

    {{ formAccount.label("phone") }}
    <br>
    {{ formAccount.render("phone") }}
    <br>
    {{ formAccount.label("email") }}
    <br>
    {{ formAccount.render("email") }}
    <br>
    {{ formAccount.label("address") }}
    <br>
    {{ formAccount.render("address") }}
    <br>
    {{ formAccount.label("oldPassword") }}
    <br>
    {{ formAccount.render("oldPassword") }}
    <br>
    {{ formAccount.label("newPassword") }}
    <br>
    {{ formAccount.render("newPassword") }}
    <br>
    {{ submit_button("value": "Spremite promjene") }}
    {{ end_form() }}
</div>