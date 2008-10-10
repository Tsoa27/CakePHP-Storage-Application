<h2>Login</h2>
<p>Please enter your username and password below to login.</p>
<fieldset class="fieldset1">
	<?php echo $form->create('User', array('action' => 'login'));?>
        <?php if($session->check('Message.flash')) $session->flash(); ?>
        <?php if($session->check('Message.auth')) $session->flash('auth'); ?>
        <?php echo $form->input('username', array('value' => $defaultUsername)); ?>
        <?php echo $form->input('password'); ?>
        <?php echo $form->submit('Login', array('id' => 'UserLogin')); ?>
		<?php echo $html->link('Forgot password', '/users/forgot_password'); ?>
    <?php echo $form->end(); ?>
</fieldset>
<p>Don't have an account yet? Simply visit the <?php echo $html->link('register', '/users/register'); ?> page to create an account.</p>