<?php


namespace App\Models;


class Confirm extends UsersModel
{
    private $data;
    private $errors = [];

    public function __construct($data)
    {
        $this->data = $data;
    }

    private function getField($field){
        if(!isset($this->data[$field])){
            return null;
        }
        return $this->data[$field];
    }


    public function usernameAlpha($field, $errorMsg)
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
            $this->errors[$field] = $errorMsg;
        }
    }

    public function checkUniq($field, $table, $errorMsg){

        $data = Query::reqQuery("select id FROM $table WHERE $field=?", [$this->getField($field)])->fetch();
        if($data){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function checkEmailFilter($field, $errorMsg){
        if(!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function checkPasswordConfirm($field, $errorMsg){
        $value = $this->getField($field);
        if(empty($value)  || $value != $this->getField($field . '_confirm')){
            $this->errors[$field] = $errorMsg;
        }
    }

    public function ifConfirmed(){
        return empty($this->errors); //tableau vide = true
    }

    public function getErrors(){
        return $this->errors;
    }

   



}