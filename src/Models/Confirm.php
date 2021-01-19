<?php


namespace App\Models;


class Confirm extends UsersModel
{
    private static $data;
    private static $errors = [];

    public function __construct($data) {
        self::$data = $data;
    }

    private static function getField($field) {
        if(!isset(self::$data[$field])){
            return null;
        }
        return self::$data[$field];
    }

    public function usernameAlpha($field, $errorMsg) {
        if (!preg_match('/^[a-zA-Z0-9_]+$/', self::getField($field))) {
                self::$errors[$field] = $errorMsg;
            }
    }

    public static function checkUniq($field, $table, $errorMsg){
        $data = Query::reqQuery("select id FROM $table WHERE $field=?", [self::getField($field)])->fetch();
        if($data){
            self::$errors[$field] = $errorMsg;
        }
    }

    public function checkEmailFilter($field, $errorMsg){
        if(!filter_var(self::getField($field), FILTER_VALIDATE_EMAIL)){
            self::$errors[$field] = $errorMsg;
        }
    }

    public function checkPasswordConfirm($field, $errorMsg){
        $value = self::getField($field);
        if(empty($value)  || $value != self::getField($field . '_confirm')){
            self::$errors[$field] = $errorMsg;
        }
    }

    public function ifConfirmed(){
        return empty(self::$errors); //tableau vide = true
    }

    public function getErrors(){
        return self::$errors;
    }

    public function strToken($field, $errorMsg){
        $token_confirm = strlen(self::getField($field));
        if($token_confirm === 60){
        }else{
            self::$errors[$field] = $errorMsg;
        }
    }

}