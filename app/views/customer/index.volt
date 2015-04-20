{{ content() }}
<?php echo $t->_("register") ?>
<br>
<br>

{{ form(this.dispatcher.getParam("language")~"/customer/register", "role": "form") }}
<div class="form-group">
{{ formUser.label("username") }}
{{ formUser.render("username", ["class": "form-control", "placeholder": "Username"]) }}
</div>

<div class="form-group">
{{ formUser.label("phone") }}
{{ formUser.render("phone", ["class": "form-control", "placeholder": "Phone number"]) }}
</div>

<div class="form-group">
{{ formUser.label("email") }}
{{ formUser.render("email", ["class": "form-control", "placeholder": "Email"]) }}
</div>

<div class="form-group">
{{ formUser.label("address") }}
{{ formUser.render("address", ["class": "form-control", "placeholder": "Username"]) }}
</div>

<div class="form-group">
{{ formUser.label("password") }}
{{ formUser.render("password", ["class": "form-control", "placeholder": "Password"]) }}
</div>

<div class="form-group">
{{ submit_button("value": "Register", "class": "btn btn-default") }}
</div>

{{ end_form() }}




