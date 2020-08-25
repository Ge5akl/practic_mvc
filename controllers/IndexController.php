<?php

class indexController extends Controller {

	private $pageTpl = '/views/main.tpl.php';


	public function __construct() {
		$this->model = new IndexModel();
		$this->view = new View();
	}

	public function auth(){
		$login = $_POST['login'];
		settype($login, 'string');
		$password = md5($_POST['password']);
		settype($login, 'string');
		$this->model->checkUser($login, $password);
	}

	public function index() {
		$this->pageData['title'] = "Вход в личный кабинет";
		if(!empty($_POST)) {
			if(!$this->login()) {
				$this->pageData['error'] = "Неправильный логин или пароль";
			}
		}
		if(isset($_POST['btn_submit_auth'])){
			$this->auth();

		}
		

		$this->view->render($this->pageTpl, $this->pageData);

	}

	public function login() {
		if(!$this->model->checkUser($login, $pasword)) {
			return false;
		} 
	}



}

