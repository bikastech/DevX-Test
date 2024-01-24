<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<title>DevX-Test Bikas</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php echo $this->Html->charset(); ?>
	<?php
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style');
		echo $this->Html->css('cake.generic');
		echo $this->Html->script('bootstrap.bundle.min');
		echo $this->Html->script('jquery-3.6.4.min');
		echo $this->Html->script('jquery.validate.min');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<nav class="navbar navbar-expand-sm bg-info navbar-light">
				<div class="container-fluid">
					<ul class="navbar-nav">
					  	
						<?php if(AuthComponent::user()) { ?>
					  	<li class="nav-item">
						  <?php echo $this->Html->link('User List ', array('action' => 'index'), array('class' => 'nav-link')); ?>
					  	</li>
						<li class="nav-item">
						  <?php echo $this->Html->link('Sign-Out', array('action' => 'logout'), array('class' => 'nav-link')); ?>
					  	</li>
						<?php } else { ?>
						<li class="nav-item">
						  <?php echo $this->Html->link('SignUp', array('action' => 'add'), array('class' => 'nav-link')); ?>
					  	</li>
					  	<li class="nav-item">
						  <?php echo $this->Html->link('Sign-In', array('action' => 'login'), array('class' => 'nav-link')); ?>
					  	</li>
						<?php } ?>
						
						  
					</ul>
				</div>
			</nav>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		<nav class="navbar navbar-expand-sm bg-info navbar-light">
				<div class="container-fluid">
					<ul class="navbar-nav">
					  	
						<?php if(AuthComponent::user()) { ?>
					  	<li class="nav-item">
						  <?php echo $this->Html->link('User List ', array('action' => 'index'), array('class' => 'nav-link')); ?>
					  	</li>
						<li class="nav-item">
						  <?php echo $this->Html->link('Sign-Out', array('action' => 'logout'), array('class' => 'nav-link')); ?>
					  	</li>
						<?php } else { ?>
						<li class="nav-item">
						  <?php echo $this->Html->link('SignUp', array('action' => 'add'), array('class' => 'nav-link')); ?>
					  	</li>
					  	<li class="nav-item">
						  <?php echo $this->Html->link('Sign-In', array('action' => 'login'), array('class' => 'nav-link')); ?>
					  	</li>
						<?php } ?>
						  
					</ul>
				</div>
			</nav>
		</div>
	</div>
</body>
</html>
