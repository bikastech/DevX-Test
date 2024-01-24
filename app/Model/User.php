<?php
class User extends AppModel {

    public function beforeFind($queryData) {
        $queryData['conditions']['User.is_deleted'] = 0; // Fix syntax error
        return $queryData;
    }
    
    public $validate = array(
        'first_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'last_name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'phone' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This email is already taken.',
            ),
        ),
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'address' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'state' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            ),
        ),
        'created_at' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            ),
        ),
        'updated_at' => array(
            'datetime' => array(
                'rule' => array('datetime'),
            ),
        ),
    );
}
