<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function beforeFilter() {
        $this->Auth->allow('add');    

        // Indian states array
        $this->set('indianStates', array(
            'Andaman and Nicobar Islands',
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chandigarh',
            'Chhattisgarh',
            'Dadra and Nagar Haveli',
            'Daman and Diu',
            'Delhi',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Lakshadweep',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Puducherry',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttar Pradesh',
            'Uttarakhand',
            'West Bengal'
        ));
    }
    public function login () {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirect());
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    public function logout () {
        $this->redirect($this->Auth->logout());
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {

        // Get the logged-in user's data
        $loggedInUser = $this->Auth->user();
        
        // Check if the user is logged in and is an admin
        $isAdmin = !empty($loggedInUser) && $loggedInUser['is_admin'] == 1;

        // Set the variable to be used in the view
        $this->set('isAdmin', $isAdmin);

        $this->Paginator->settings = array(
            'limit' => 10, // Number of records per page
            'order' => array('User.id' => 'asc'), // Order by user ID or any other field
            'fields' => array(
                'id',
                'first_name',
                'last_name',
                'phone',
                'email',
                'address',
                'state',
                'is_admin',
                'created_at',
                'updated_at',
            )
        );
        
        $users = $this->Paginator->paginate();

        foreach ($users as &$user) {
            $user['User']['state'] = $this->getStateName($user['User']['state']);
            $user['User']['is_admin'] = $this->getUserRole($user['User']['is_admin']);
        }
       
		$this->set('users', $users);
	}

    // Function to get user role from is_admin value
    private function getUserRole($isAdminValue) {
        return ($isAdminValue == 1) ? 'Admin' : 'User';
    }

    // Function to get state name from numeric value
    private function getStateName($stateValue) {
        $indianStates = $this->viewVars['indianStates']; // Access the array set in AppController
        return isset($indianStates[$stateValue]) ? $indianStates[$stateValue] : 'Unknown State';
    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->set('indianStates', array(
            'Andaman and Nicobar Islands',
            'Andhra Pradesh',
            'Arunachal Pradesh',
            'Assam',
            'Bihar',
            'Chandigarh',
            'Chhattisgarh',
            'Dadra and Nagar Haveli',
            'Daman and Diu',
            'Delhi',
            'Goa',
            'Gujarat',
            'Haryana',
            'Himachal Pradesh',
            'Jharkhand',
            'Karnataka',
            'Kerala',
            'Lakshadweep',
            'Madhya Pradesh',
            'Maharashtra',
            'Manipur',
            'Meghalaya',
            'Mizoram',
            'Nagaland',
            'Odisha',
            'Puducherry',
            'Punjab',
            'Rajasthan',
            'Sikkim',
            'Tamil Nadu',
            'Telangana',
            'Tripura',
            'Uttar Pradesh',
            'Uttarakhand',
            'West Bengal'
        ));

		if ($this->request->is('post')) {
            // Check if passwords match
            if ($this->request->data['User']['password'] === $this->request->data['User']['c_password']) {
                // Passwords match, proceed with saving
                $this->User->create();
                $this->request->data['User']['password'] = AuthComponent::password($this->request->data['User']['password']);
                if ($this->User->save($this->request->data)) {
                    $this->Auth->login($this->request->data);
                    $this->Session->setFlash('User registered successfully.');
                    // Redirect to the Users List page
                    return $this->redirect(array('action' => 'index'));

                } else {
                    $this->Session->setFlash('Error registering user. Please, try again.');
                }
            } else {
                // Passwords do not match, show error
                $this->Session->setFlash('Passwords do not match.');
            }
        }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid user'));
        }
    
        $user = $this->User->findById($id);
        if (!$user) {
            throw new NotFoundException(__('Invalid user'));
        }
    
        // Soft delete the user by updating the 'deleted' field
        $this->User->id = $id;
        $this->User->saveField('deleted_at', date('Y-m-d H:i:s'));
        $this->User->saveField('is_deleted', 1);
    
        $this->Session->setFlash(__('User deleted'));
        return $this->redirect(array('action' => 'index'));
	}
}
