<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
class Websettings{
	
	public $debug, $site_title;
	
	public function __construct(){
		$data_settings = DB::getInstance()->query("SELECT* FROM settings WHERE id = ? OR id = ?", array('debug_status','site_title'));
		$this->debug = $data_settings->results()[0]->value;
		$this->site_title = $data_settings->results()[1]->value;
	}
		
	public function getDebugger(){
		return $this->debug;
	}
	
	public function getSite_title(){
		return $this->site_title;
	}	

}


?>