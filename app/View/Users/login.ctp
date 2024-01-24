<!-- app/View/Users/login.ctp -->

<div class="container mt-3">

    <?php
    echo $this->Form->create('User', array('class' => 'row g-3'));
    ?>
    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-4">
            <h2> Login Form </h2>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2"></div>
    </div>

    <div class="row">
        <div class="col-md-2"></div>
        <?php
        echo $this->Form->input('email', array(
            'label' => 'Email',
            'div' => array('class' => 'col-md-4'),
            'class' => 'form-control',
            'id' => 'email'
        ));

        echo $this->Form->input('password', array(
            'label' => 'Password',
            'div' => array('class' => 'col-md-4'),
            'class' => 'form-control',
            'id' => 'password'
        ));
        ?>
        <div class="col-md-2"></div>
    </div>

    <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-4">
            <?php
            echo $this->Form->end('Login');
            ?>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-2"></div>
    </div>

</div>