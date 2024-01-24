<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		// echo $this->Form->input('state');

		echo $this->Form->input('state', array(
			'label' => 'State',
			'div' => array('class' => 'col-md-6'),
			'class' => 'form-select',
			'id' => 'inputState',
			'options' => $indianStates,
			'empty' => 'Select State'
		));
		echo $this->Form->input('is_admin');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
