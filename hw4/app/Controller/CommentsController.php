class CommentsController extends AppController{
    public $helper = array('Html', 'Form');

    public function index(){
        $this->set('comments', $this->Comment->find('all'));
    }
}

