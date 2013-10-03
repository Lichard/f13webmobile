<?php
class UsersController extends AppController{
    public $helpers = array('Html', 'Form');

    public function index(){
        $this->set('users', $this->User->find('all'));
    }
    public function view($id=null){
        if(!$id){
            throw new NotFoundException(_('Invalid post'));
        }
        $users = $this->User->find('all',array('conditions' => array('User.name' => $id)));
        $this->set('users', $users);
    }
}
