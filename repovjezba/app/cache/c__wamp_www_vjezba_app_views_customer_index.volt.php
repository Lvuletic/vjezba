<?php echo $this->getContent(); ?>
<?php echo $t->_("register") ?>
<div>
    <?php echo $this->tag->form(array('customer/register', 'role' => 'form')); ?>
    <?php echo $formUser->label('username'); ?>
    <br>
    <?php echo $formUser->render('username'); ?>
    <br>
    <?php echo $formUser->label('phone'); ?>
    <br>
    <?php echo $formUser->render('phone'); ?>
    <br>
    <?php echo $formUser->label('email'); ?>
    <br>
    <?php echo $formUser->render('email'); ?>
    <br>
    <?php echo $formUser->label('address'); ?>
    <br>
    <?php echo $formUser->render('address'); ?>
    <br>
    <?php echo $formUser->label('password'); ?>
    <br>
    <?php echo $formUser->render('password'); ?>
    <br>
    <?php echo $this->tag->submitButton(array('value' => 'Register')); ?>
    <?php echo $this->tag->endForm(); ?>
</div>