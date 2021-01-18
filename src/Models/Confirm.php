<?php


namespace App\Models;


class Confirm extends UsersModel
{
    private static $data;
    private static $errors = [];

    public function __construct($dataExterne)
    {
        self::$data = $dataExterne;
    }

    private function getField($field){
        if(!isset(self::$data[$field])){
            return null;
        }
        return self::$data[$field];
    }


    public function usernameAlpha($field, $errorMsg)
    {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
            self::$data[$field] = $errorMsg;
        }
    }

    public function checkUniq($field, $table, $errorMsg){
       
        $data = Query::reqQuery("select id FROM $table WHERE $field=?", [$this->getField($field)])->fetch();
        if($data){
            self::$data[$field] = $errorMsg;
        }
    }

    public function checkEmailFilter($field, $errorMsg){
        if(!filter_var($this->getField($field), FILTER_VALIDATE_EMAIL)){
            self::$data[$field] = $errorMsg;
        }
    }

    public function checkPasswordConfirm($field, $errorMsg){
        $value = $this->getField($field);
        if(empty($value)  || $value != $this->getField($field . '_confirm')){
            self::$data[$field] = $errorMsg;
        }
    }

    public function ifConfirmed(){
        return empty(self::$data); //tableau vide = true
        echo "erreursdlqdlqsdsq";
    }

    public function getErrors(){
        return self::$data;
    }

    public function strToken($field, $errorMsg){

        $token_confirm = strlen($this->getField($field));
        if($token_confirm === 60){

        }else{
            self::$data[$field] = $errorMsg;
        }

    }



}