<?php
class CommentsController extends AppController{
    public $helpers = array('Html', 'Form');

    public function index(){
        $this->set('comments', $this->Comment->find('all'));
    }
    public function view($id=null){
        if(!$id){
            throw new NotFoundException(_('Invalid post'));
        }
        $comments = $this->Comment->find('all',array('conditions' => array('Comment.user' => $id)));
        $this->set('comments', $comments);
    }
}
