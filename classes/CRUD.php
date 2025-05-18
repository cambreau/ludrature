<?php

class CRUD extends PDO{

    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=ludrature;port=3306;charset=utf8', 'root', 'admin');
    }

    public function select($table, $champ = 'id', $order='asc'){
        $sql = "SELECT * FROM $table ORDER BY $champ $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value, $champ = 'id'){
        $sql = "SELECT * FROM  $table WHERE $champ = :$champ";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champ", $value);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count == 1){
            return $stmt->fetch();
        }else{
            return false;
        } 
    }

    public function insert($table, $data){
        $champName = implode(', ', array_keys($data));
        $champValue = ":".implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($champName) VALUES ($champValue);";
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();
        return $this->lastInsertId();
    }

    public function update($table, $data, $champ = "id"){
        $champName = null;
        foreach($data as $key=>$value){
            $champName .= "$key = :$key, ";
        }
        $champName = rtrim($champName, ', ');
        $sql = "UPDATE $table SET $champName WHERE $champ = :$champ";
        $stmt = $this->prepare($sql);
        foreach($data as $key=>$value){
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($table, $value, $champ = 'id'){
        $sql = "DELETE FROM $table WHERE $champ = :$champ";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$champ", $value);
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }

    }

}