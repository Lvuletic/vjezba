<?php echo $this->getContent(); ?>
<?php echo $t->_("login") ?>
<div>
    <?php echo $this->tag->form(array('login/login', 'role' => 'form')); ?>
    <?php echo $form->label('usermail'); ?>
    <br>
    <?php echo $form->render('usermail'); ?>
    <br>
    <?php echo $form->label('password'); ?>
    <br>
    <?php echo $form->render('password'); ?>
    <br>
    <?php echo $this->tag->submitButton(array('value' => 'Login')); ?>
    <?php echo $this->tag->endForm(); ?>
</div>