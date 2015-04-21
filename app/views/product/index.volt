{{ content() }}
<?php echo $t->_("product") ?>

{{ form(this.dispatcher.getParam("language")~"/product/create", "role": "form") }}

<div class="form-group">
{{ form.label("name") }}
{{ form.render("name", ["class": "form-control", "placeholder": "Name"]) }}
</div>

<div class="form-group">
{{ form.label("price") }}
{{ form.render("price", ["class": "form-control", "placeholder": "Price"]) }}
</div>

<div class="form-group">
{{ form.label("type") }}
{{ form.render("type", ["class": "form-control"]) }}
</div>

{{ submit_button("value": "Create", "class": "btn btn-default") }}
{{ end_form() }}


<br>

<div>
<table id="products" class="table table-bordered" width="100%">
    <tr>
        <th>Kod</th>
        <th>Naziv</th>
        <th>Cijena</th>
        <th>Tip</th>
    </tr>
    {% for row in productsList %}
    <tr>
        <div id="results">
        <td>{{ row.product.getCode() }}</td>
        <td>{{ row.product.getName() }}</td>
        <td>{{ row.product.getPrice() }}</td>
        <td>{{ row.description }}</td>

        <td> <?php echo $this->tag->linkTo($this->dispatcher->getParam("language")."/product/edit/".$row->product->getCode(), "Edit") ?> </td>

        <td> <?php echo $this->tag->linkTo($this->dispatcher->getParam("language")."/product/delete/".$row->product->getCode(), "Delete") ?> </td>
        </div>
    </tr>

    {% endfor %}
    </table>
<table>
</div>