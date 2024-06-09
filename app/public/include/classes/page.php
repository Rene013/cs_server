<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
class Page {
    private $_db,
            $_page;
    public  $_data,
			$_type;        
    

    public function __construct() {
		
			$this->_db = DB::getInstance();
			
			$this->_page = Config::get('uri_parts/last');

			//echo View::exists($this->_page); die();
				
			if(View::exists($this->_page)) {
					
				$page = $this->_page;

				if($this->find($page)) {
						
					// $post_type = new Post_type();
					
					// $post_type->_existType($page);
					
					// $this->data_type = $post_type->_post_data;
					
					$data_type = $this->_db->get('post_types',array('id','=', $this->_data->type));
			
						if($data_type->count()){
									
							$this->_type= $data_type->first();

							//print_r($this->_data); die();

							//return true;
							}
						
				} else {
						
					$this->find('404');
					
					$data_type = $this->_db->get('post_types',array('id','=', $this->_data->type));
					
					$this->_type = $data_type->first();
						
				}
				
			} else {
							
			$this->find('home');
			
			$data_type = $this->_db->get('post_types',array('id','=', $this->_data->type));
					
			$this->_type= $data_type->first();
		}

	}
	
		

		

    public function create($fields = array()) {
        
        if(!$this->_db->insert('posts', $fields)) {
            throw new Exception('Sorry, there was a problem creating this page;');
        }
    }

    private function find($page = null) {
        if($page) {
            $field = (is_numeric($page)) ? 'id' : 'slug';
			//echo $field; die();
            $data = $this->_db->get('posts', array($field, '=', $page));
			//print_r($data); die();
            if($data->count()) {
                $this->_data = $data->first();
				$this->_data->body_nohtml = strip_tags($this->_data->body);
						
						if($this->_data->body == $this->_data->body_nohtml) {
							
							$this->_data->body_formatted = '<p>'.$this->_data->body.'</p>';
							
						} else {
							
							$this->_data->body_formatted = $this->_data->body;
							
						}
						if($this->_data->parent_id != 0){
							
							$this->_data->parent_data = $this->_db->get('posts', array('id','=', $this->_data->parent_id))->first();					
						}
                return true;
            }
        }
        return false;
    }
	
	/* public function randering($slug) {
        $page = $this->find($slug);
		if($page){
			$data_type = $this->_db->get('post_types',array('id','=', $this->_data->type));
			if($data_type->count()){
				$this->_type =$data_type->first(); print_r($this->_type);
				return true;
			} 
		}
		return false;
	} */

    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    public function data(){
        return $this->_data;
    }
	public function count_pages(){	
		return $this->_db->state("posts")->count();		
	}

   /*  public function load($page) {
		
		include('view/'. $this->_type->name .'.php');
		
        return true;
    } */
}
?>