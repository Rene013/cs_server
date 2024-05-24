<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');
class User {
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $isLoggedIn,
			$isActive;

    public function __construct($user = null) {
        $this->_db = DB::getInstance();
        $this->_sessionName = Config::get('sessions/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');
		$this->isActive = false;
        if(!$user) {
            if(Session::exists($this->_sessionName)) {
                $user = Session::get($this->_sessionName);

                if($this->find($user)) {
                    $this->isLoggedIn = true;
                } else {
                    //Logout
                }
            }
        } else {
            $this->find($user);
        }
    }

    public function create($fields = array()) {
        if(!$this->_db->insert('users', $fields)) {
            throw new Exception('Sorry, there was a problem creating your account;');
        }
		
    }

    public function update($fields = array(), $id = null) {

        if(!$id && $this->isLoggedIn()) {
            $id = $this->data()->id;
        }

        if(!$this->_db->update('users', $id, $fields)) {
            throw new Exception('There was a problem updating');
        }
    }

    public function find($user = null) {
        if($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
    }

    public function login($username = null, $password = null, $remember = false) {
        if(!$username && !$password && $this->exists()) {
            Session::put($this->_sessionName, $this->data()->id);
        } else {
            $user = $this->find($username);

            if ($user) {
                if ($this->data()->password ){//=== Hash::make($password, $this->data()->salt)) {
                    Session::put($this->_sessionName, $this->data()->id);

                    if ($remember) {
                        $hash = Hash::unique();
                        

                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));echo $hash;
                        } else {
                            $hash = $hashCheck->first()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));
                    }

                    return true;
                }
            }
        }
        return false;
    }

    public function hasPermission($key) {
        $group = $this->_db->get('groups', array('id', '=', $this->data()->group));

        if($group->count()) {
            $permissions = json_decode($group->first()->permissions, true);

            return !empty($permissions[$key]);
        }

        return false;
    }

    public function exists() {
        return (!empty($this->_data)) ? true : false;
    }

    public function logout() {
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }

    public function data(){
        return $this->_data;
    }

    public function isLoggedIn() {
        return $this->isLoggedIn;
    }
	
	public function activate($email, $email_code){
		
		$userToActivate = $this->_db->query("SELECT FROM users WHERE email = ? AND email_code = ? AND status = ?", array($email,$email_code,0));
		//echo '<pre>'; print_r($userToActivate->first());echo '</pre>';
		if ($userToActivate->count()){
			
			return $this->_db->update('users', $userToActivate->first()->id, array('status'=> 1)) ? true : false;
			
		}
		
	}
	public function isActive(){
		if($this->_data){
			$this->isActive = $this->_data->status;
		}
		return $this->isActive; //return $this->_db->query("SELECT* FROM users WHERE username = ? AND status = ?", array($this->_data->username,1)) ? true : false;
	}
	public function isPassStatus(){
		return $this->_data->password_recover ? true : false;
	}
	
	public function emailExists($email){
		if($email) {
            $data = $this->_db->get('users', array('email','=', $email));
            if($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
        return false;
	}
	public function count_users(){	
		return $this->_db->state("users")->count();		
	}
		
}


?>