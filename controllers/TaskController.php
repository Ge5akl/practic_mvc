<?php


class TaskController extends Controller
{


	private $pageTpl = '/views/Task.tpl.php';


	public function __construct()
	{
		if (!isset($_SESSION["login"])) {
			header("Location: /");
		} else {
			$this->model = new TaskModel();
			$this->view = new View();
		}
	}
	// получение индетефикатора пользователя
	protected function getUserId()
	{
		$row = $this->model->getUserId();
		return $row;
	}
	// функция для получения контента заданий
	protected function getTaskContent()
	{
		$row = $this->model->getTask();
		return $row;
	}
	// функция удаления задания
	public function delTask()
	{
		if (empty((int)$_POST['work'])) {
			header("Location: /task");
		} else {
			$idWork = $_POST['work'];
			settype($work, 'string');
			if (!$this->model->deleteTask($idWork)) {
				$this->pageData['error'] = "Данного задания не найдено, взломщик :D";
			}
			$this->model->deleteTask($idWork);
		}
	}
	// функция добавления задания
	public function addTask()
	{
		if (empty((string)$_POST['name'])) {
			header("Location: /task");
		} else {
			$discript = htmlspecialchars((string)$_POST['name']);
			$today = date("m.d.y");
			$UsrId = $_SESSION['UserId'];
			$this->model->addTask($discript, $today, $UsrId);
		}
	}
	// Функция обновления задания
	public function editTask()
	{
		if (empty((int)$_POST['work'])) {
			header("Location: /task");
		} else {
			$idWork = $_POST['work'];
			settype($idWork, 'string');
			if (!$this->model->UdpdateTask($idWork)) {
				$this->pageData['error'] = "Взломщик, это тебе с рук не сойдет :)";
			}
			$this->model->udpdateTask($idWork);
		}
	}

	// Главная функция, происходят все операций здесь
	public function index()
	{
		//if(!isset($_SESSION["login"])){
		//header("Location: /");
		//}
		//else	{
		if (isset($_POST["addTask"])) {
			if (!empty($_POST) && !empty($_POST['name'])) {
				$this->addTask();
				header("Refresh: 0");
			} else {
				$this->pageData['TaskMsg'] = "Вы заполнили не все поля";
				return false;
			}
		}
		if (isset($_POST['delete_work'])) {
			$this->delTask();
			header("Refresh: 0");
		}
		if (isset($_POST['edit_work'])) {
			$this->editTask();
			header("Refresh: 0");
		}

		$tasks = $this->model->getTask();
		$this->pageData['tasks'] = $tasks;

		$this->view->render($this->pageTpl, $this->pageData);
		//}
	}
	// функция выхода из учетки
	public function logout()
	{
		session_destroy();
		header("Location: /");
	}
}
