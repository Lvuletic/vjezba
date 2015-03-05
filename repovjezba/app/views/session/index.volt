
<div>
{{ form("session/login", "role": "form") }}
{{ form.label("usermail") }}
{{ form.render("usermail") }}
<br>
{{ form.label("password") }}
{{ form.render("password") }}
<br>
{{ submit_button("value": "Login") }}
{{ end_form() }}
</div>