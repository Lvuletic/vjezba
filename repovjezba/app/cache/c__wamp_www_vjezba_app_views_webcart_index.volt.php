<?php echo $this->getContent(); ?>
<?php echo $t->_("webshop") ?>
<div>
    <?php echo $this->tag->form(array('webcart/index', 'role' => 'form')); ?>
    <?php echo $formProduct->label('product'); ?>
    <br>
    <?php echo $formProduct->render('product'); ?>
    <?php echo $this->tag->endForm(); ?>
</div>


<?php echo $this->tag->submitButton(array('name' => 'add', 'value' => 'Add product', 'id' => 'addProduct', 'onclick' => 'addProduct()')); ?>
<br><br>
<?php echo $this->tag->form(array('orders/create', 'role' => 'form')); ?>
<?php echo $formWebCart->label('webcart'); ?>
<br>
<?php echo $formWebCart->render('webcart'); ?>
<br>
<?php echo $this->tag->tagHtml('button', array('type' => 'button', 'onclick' => 'removeProduct()'), false, true, true); ?>
Remove product
<?php echo $this->tag->tagHtmlClose('button'); ?>
<br>
<br>
<?php echo $this->tag->submitButton(array('name' => 'create', 'value' => 'Save order', 'onclick' => 'selectAll()')); ?>

<?php echo $this->tag->endForm(); ?>
</form>


