<?php
defined('_SECURE_') or die('Trying to access secured file, SORRY');

class Validate {
    private $_passed = false;
    private $_errors = array();
    private $_db = null;

    public function __construct() {
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array()) {
        foreach($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {
                $value = $source[$item];
                $item = escape($item);

                if($rule === 'required' && empty($value)) {
                    $this->addError(array($item => "{$item} is required"));
                } else if (!empty($value)) {
                    switch($rule) {
                        case 'min':
                            if(strlen($value) < $rule_value) {
                                $this->addError(array($item => "{$item} must be a minimum of {$rule_value} characters."));
                            }
                            break;

                        case 'max':
                            if(strlen($value) > $rule_value) {
                                $this->addError(array($item => "{$item} must be a maximum of {$rule_value} characters."));
                            }
                            break;
                        case 'matches':
                            if($value != $source[$rule_value]) {
                                $this->addError(array($item => "{$rule_value} must match {$item}."));
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));

                            if($check->count()) {
                                $this->addError(array($item => "{$item} already exists."));
                            }
                            break;
                    }
                }
            }
        }

        if(empty($this->_errors)) {
            $this->_passed = true;
        }

        return $this;
    }

    private function addError(array $itemError) {
		foreach($itemError as $x => $x_value){
			$this->_errors[$x] = $x_value;
		}
		return $this->_errors;
	}

    public function errors() {
        return $this->_errors;
    }

    public function passed() {
        return $this->_passed;
    }
}
?>