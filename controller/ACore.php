<?php
abstract class ACore {
	
	
	protected $m;
	
	public function __construct() {
		$this->m = new model();;
	}
	
	protected function get_header() {
		return TRUE;
	}
	
	//protected function get_footer() {
	//	$row = $this->m->menu_array();
	//	return $row;
	//}
	
	
	public function get_body($tpl) {
		$this->get_header();
		//$footer = $this->get_footer();
		//$tpl - template
		include "tpl/index.php";
	}
	
	abstract function get_content();
	
}

?>