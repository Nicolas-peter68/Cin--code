<?php


namespace App\Models;


class Confirm extends UsersModel
{
    private $data;
    private $errors;

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


    public function alnumeriq($field, $errorMsg){
        if(!preg_match('/^[a-zA-Z0-9_]+$/', $this->getField($field))) {
        $this->errors[$field] = $errorMsg;

        }
    }

    public function checkUsername($field, $table, $errorMsg){
        $proto = new Prototype(); // Cette class est dépéntante d'une autre je vais chercher prochainement comment l'a rendre indépendante
        $dataRegiste = $proto->reqQuery("select id FROM $table WHERE $field =?", [$this->getField($field)])->fetch();
        if($dataRegiste){
            $this->errors[$field] = $errorMsg;
            echo 'Erreur !';
        }
    }


}