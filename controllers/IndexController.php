<?php

class indexController extends Controller
{

	private $pageTpl = '/views/main.tpl.php';


	public function __construct()
	{
		$this->model = new IndexModel();
		$this->view = new View();
	}

	public function auth()
	{
		$login = $_POST['login'];
		settype($login, 'string');
		$password = md5($_POST['password']);
		settype($login, 'string');
		if ($this->model->checkUser($login, $password)) {
			$_SESSION['login'] = $login;
			header("Location: /task");
		}
		if (!$this->model->checkUser($login, $password)) {
			$this->pageData['error'] = "Аккаунт уже существует! Не правильный пароль для входа в аккаунт	";
		}
	}

	public function index()
	{
		$this->pageData['title'] = "Вход в личный кабинет";
		if (isset($_POST['btn_submit_auth'])) {
			$this->auth();
		}


		$this->view->render($this->pageTpl, $this->pageData);
	}

	public function login()
	{
		if (!$this->model->checkUser($login, $pasword)) {
			return false;
		}
	}
}
