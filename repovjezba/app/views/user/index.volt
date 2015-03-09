<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 05/03/15
 * Time: 16:17
 */

use Phalcon\Tag; ?>

<h2>Sign up using this form</h2>

<?php echo Tag::form("user/register"); ?>

<p>
    <label for="name">Name</label>
    <?php echo Tag::textField("name") ?>
</p>

<p>
    <label for="email">phone</label>
    <?php echo Tag::textField("phone") ?>
</p>

<p>
    <label for="email">E-Mail</label>
    <?php echo Tag::textField("email") ?>
</p>

<p>
    <label for="email">password</label>
    <?php echo Tag::textField("password") ?>
</p>


<p>
    <?php echo Tag::submitButton("Register") ?>
</p>

</form>