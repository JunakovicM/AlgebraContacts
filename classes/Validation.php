<?php

class Validation{

    private $db = null; // sad je null ali s prvim pozivom ce se napunit u bazu
    private $passed = false;
    private $errors = array();

    public function __construct(){
        $this->db = DB::getInstance();

    }

    public function check($items = array()){

        foreach ($items as $item => $rules) {
            foreach($rules as $rule => $rule_value) {

                $item = escape($item);   // izbjegava html karaktere 
                $value = trim(Input::get($item));        // trim sluzim ukoliko neko unese vrijednost slucajno s razmakom
                
                if ($rule === 'required' && empty($value)) {
                    $this->addError($item, "Field $item is required.");
                } elseif (!empty($value)) {
                     switch ($rule) {
                         case 'min':
                             if (strlen($value) < $rule_value) {
                                 $this->addError($item, "Filed $item must 
                                 have a minimum of $rule_value
                                 characters.");
                             }
                             break;
                         case 'max':
                            if (strlen($value) > $rule_value) {
                                $this->addError($item, "Filed $item must 
                                have a maximum of $rule_value
                                characters.");
                            }
                             break;
                         case 'unique':
                               $check = $this->db->get('id', $rule_value, 
                               [$item, '=', $value])->getCount();
                               if ($check){
                                   $this->addError($item, "$item already exists.");
                               }
                             break;
                         case 'matches':
                             if ($value != Input::get('password')) {
                                 $this->addError($item, "Filed $item must
                                  match $rule_value.");
                             }
                             break;
                     }

                }
            }

        }
        if (empty($this->errors)) {
            $this->passed = true;
        }

        return $this;
   
    }

    public function addError($item, $error) {
        $this->errors[$item] = $error;
    }

    public function hasError($field) {
        if(isset($this->errors[$field])) {

        }
        return false;
    }
    
    public function getErrors(){
        return $this->errors;
    }

    public function passed(){
        return $this->passed;
    }
}