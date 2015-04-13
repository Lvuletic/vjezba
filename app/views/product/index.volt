{{ content() }}
<?php echo $t->_("product") ?>
<div>
    {{ form(this.session.get("lang")~"/product/create", "role": "form") }}
    {{ form.label("name") }}
    <br>
    {{ form.render("name") }}
    <br>
    {{ form.label("price") }}
    <br>
    {{ form.render("price") }}
    <br>
    {{ form.label("type") }}
    <br>
    {{ form.render("type") }}
    {{ submit_button("value": "Create") }}
    {{ end_form() }}
</div>

<br>

<div>
<table id="products" border="1">
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

        <td> <?php echo $this->tag->linkTo($this->session->get("lang")."/product/edit/".$row->product->getCode(), "Edit") ?> </td>

        <td> <?php echo $this->tag->linkTo($this->session->get("lang")."/product/delete/".$row->product->getCode(), "Delete") ?> </td>
        </div>
    </tr>

    {% endfor %}
    </table>
<table>
</div>