{{ content() }}
<?php echo $t->_("login") ?>
<div>
    {{ form(this.dispatcher.getParam("language")~"/login/login", "role": "form") }}
    {{ form.label("usermail") }}
    <br>
    {{ form.render("usermail") }}
    <br>
    {{ form.label("password") }}
    <br>
    {{ form.render("password") }}
    <br>
    {{ submit_button("value": "Login") }}
    {{ end_form() }}
</div>