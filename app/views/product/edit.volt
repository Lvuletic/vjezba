{{ content() }}
{{ link_to(["for":"products","language":this.session.get("lang")],"povratak") }}
<div>
    {{ form(this.dispatcher.getParam("language")~"/product/save", "role": "form") }}
    {{ formProductEdit.label("code") }}
    <br>
    {{ formProductEdit.render("code") }}
    <br>
    {{ formProductEdit.label("name") }}
    <br>
    {{ formProductEdit.render("name") }}
    <br>
    {{ formProductEdit.label("price") }}
    <br>
    {{ formProductEdit.render("price") }}
    <br>
    {{ formProductEdit.label("editType") }}
    <br>
    {{ formProductEdit.render("editType") }}
    <br>
    {{ submit_button("value": "Save changes") }}
    {{ end_form() }}
</div>