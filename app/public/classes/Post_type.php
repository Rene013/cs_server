<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
class Postype{
	
	private _db;
	
	public $post_data;
	
	public function _existType($page = null){
		
		if($page){
			
			$data_type = $this->_db->get('post_types',array('id','=', $this->_data->type));
					
			if($data_type->count()){
						
				$this->_post_data = $data_type->first();

				return true;
				}
	
			}
		return false;
	}
	
	
	
	
}				
?>