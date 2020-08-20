<?php
abstract class ACore {
	
	
	protected $m;
	
	public function __construct() {
		$this->m = new model();;
	}
	
	protected function get_header() {
		return TRUE;
	}
	
	protected function get_footer() {
		return TRUE;
	}

	protected function TaskList() {
		$row = $this->m->getTask();
		return $row;		
	}
	
	

	public function get_body($tpl) {
		$this->get_header();
		$content = $this->TaskList();
		$footer = $this->get_footer();
		//$tpl - template
		include "tpl/index.php";
	}
	
	abstract function getTask();
	
}

?>