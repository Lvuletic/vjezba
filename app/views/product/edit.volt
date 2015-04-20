{{ content() }}
{{ link_to(["for":"products","language":this.dispatcher.getParam("language")],"povratak") }}

{{ form(this.dispatcher.getParam("language")~"/product/save", "role": "form") }}

<div class="form-group">
{{ formProductEdit.label("code") }}
{{ formProductEdit.render("code", ["class": "form-control", "placeholder": "Code"]) }}
</div>

<div class="form-group">
{{ formProductEdit.label("name") }}
{{ formProductEdit.render("name", ["class": "form-control", "placeholder": "Name"]) }}
</div>

<div class="form-group">
{{ formProductEdit.label("price") }}
{{ formProductEdit.render("price", ["class": "form-control", "placeholder": "Price"]) }}
</div>

<div class="form-group">
{{ formProductEdit.label("editType") }}
{{ formProductEdit.render("editType", ["class": "form-control"]) }}
</div>
{{ submit_button("value": "Save changes", "class": "btn btn-default") }}
{{ end_form() }}
