{{ content() }}

{{ form(this.dispatcher.getParam("language")~"/customer/save", "role": "form") }}
<div class="form-group">
{{ formAccount.label("phone") }}
{{ formAccount.render("phone", ["class": "form-control", "placeholder": "Phone number"]) }}
</div>

<div class="form-group">
{{ formAccount.label("email") }}
{{ formAccount.render("email", ["class": "form-control", "placeholder": "Email"]) }}
</div>

<div class="form-group">
{{ formAccount.label("address") }}
{{ formAccount.render("address", ["class": "form-control", "placeholder": "Address"]) }}
</div>

<div class="form-group">
{{ formAccount.label("oldPassword") }}
{{ formAccount.render("oldPassword", ["class": "form-control", "placeholder": "Old password"]) }}
</div>

<div class="form-group">
{{ formAccount.label("newPassword") }}
{{ formAccount.render("newPassword", ["class": "form-control", "placeholder": "New password"]) }}
</div>
<div class="form-group">
{{ submit_button("value": "Save changes", "class": "btn btn-default") }}
</div>
{{ end_form() }}


