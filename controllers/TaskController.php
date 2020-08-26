<?php


class TaskController extends Controller {


	private $pageTpl = '/views/Task.tpl.php';


	  public function __construct() {
        $this->model = new TaskModel();
        $this->view = new View();
    }
      protected function getUserId() {
		$row = $this->model->getUserId();
		return $row;		
	}

    protected function getTaskContent() {
    	$UserLogin = $_SESSION['login'];
		$row = $this->model->getTask($UserLogin);
		return $row;		
	}

	public function delTask(){
			$idWork = $_POST['work'];
			settype($work, 'string');
			$this->model->deleteTask($idWork);
	}

	public function addTask(){
			$discript = (string)$_POST['name'];
			$today = date("m.d.y");   
			$UsrId = $_SESSION['UserId'];
			$this->model->addTask($discript, $today, $UsrId);
				
	}

	public function editTask(){
			$idWork = $_POST['work'];
			settype($idWork, 'string');
			$this->model->udpdateTask($idWork);	
	}	


	public function index() {
		if(!isset($_SESSION["login"])){
			header("Location: /");
		}
		if (isset($_POST["addTask"])) {
			if(!empty($_POST) && !empty($_POST['name'])) {
				$this->addTask();
			}  else {
			$this->pageData['TaskMsg'] = "Вы заполнили не все поля";
			return false;
		}
		}
		if(isset($_POST['delete_work'] )){
				$this->delTask();
				header("Refresh: 0");
		 }
		 if(isset($_POST['edit_work'] )){
		 		$this->editTask();
		 		header("Refresh: 0");
		 }

		$tasks = $this->model->getTask();
		$this->pageData['tasks'] = $tasks;

		$this->view->render($this->pageTpl, $this->pageData);
		}

	public function logout() {
		session_destroy();
		header("Location: /");
	}
}
