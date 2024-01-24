<div class="container mt-3">
    <h2>Add User</h2>
    <?php echo $this->Form->create('User'); ?>
    <div class="row g-3">
        <div class="col-md-6">
            <?php echo $this->Form->input('first_name', array('label' => 'First Name', 'class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('last_name', array('label' => 'Last Name', 'class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('phone', array('label' => 'Contact Number', 'class' => 'form-control', 'placeholder' => '10 Digit Mobile No Ex:- 9999999999')); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('email', array('label' => 'Email', 'class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <?php echo $this->Form->input('password', array('label' => 'Password', 'class' => 'form-control')); ?>
        </div>

        <div class="col-md-6">
            <div class="input password required">
                <label for="UserPassword">Confirm Password</label>
                <input name="data[User][c_password]" class="form-control" type="password" id="c_password" >
            </div>
        </div>

        <div class="col-md-6">
            <?php echo $this->Form->input('address', array('label' => 'Address', 'class' => 'form-control')); ?>
        </div>
        <div class="col-md-6">
            <?php
            echo $this->Form->input('state', array(
                'label' => 'State',
                'div' => array('class' => 'col-md-6'),
                'class' => 'form-select',
                'id' => 'inputState',
                'options' => $indianStates,
                'empty' => 'Select State'
            ));
            ?>
        </div>
    </div>
    <?php echo $this->Form->end('Submit'); ?>
</div>
<?php echo $this->Html->script('register'); ?>