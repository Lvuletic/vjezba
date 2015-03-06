{{ content() }}
<div>
    {{ form("user/register", "role": "form") }}
    {{ formUser.label("username") }}
    <br>
    {{ formUser.render("username") }}
    <br>
    {{ formUser.label("phone") }}
    <br>
    {{ formUser.render("phone") }}
    <br>
    {{ formUser.label("email") }}
    <br>
    {{ formUser.render("email") }}
    <br>
    {{ formUser.label("address") }}
    <br>
    {{ formUser.render("address") }}
    <br>
    {{ formUser.label("password") }}
    <br>
    {{ formUser.render("password") }}
    <br>
    {{ submit_button("value": "Registriraj se") }}
    {{ end_form() }}
</div>