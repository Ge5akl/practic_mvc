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
		$row = $this->model->getTask();
		return $row;		
	}

	public function index() {
		if(!isset($_SESSION["login"])){
			header("Location: /");
		}
		if(isset($_SESSION["login"])){
		$tasks = $this->model->getTask();
		$this->pageData['tasks'] = $tasks;

		if (isset($_POST["addTask"])) {
			if(!empty($_POST) && !empty($_POST['name'])) {
			$discript = $_POST['name'];
			$today = date("m.d.y");   
			$UsrId = $_SESSION['UserId'];
			$this->model->addTask($discript, $today, $UsrId);
				
		} else {
			$this->pageData['TaskMsg'] = "Вы заполнили не все поля";
			return false;
		}
		}
		if(isset($_POST['delete_work'] )){
			$idWork = $_POST['work'];
			$this->model->deleteTask($idWork);
		} 

		if(isset($_POST['edit_work'] )){
			$idWork = $_POST['work'];
			$this->model->udpdateTask($idWork);
		} 		

		$this->view->render($this->pageTpl, $this->pageData);
	}
	}

	public function logout() {
		session_destroy();
		header("Location: /");
	}
}
