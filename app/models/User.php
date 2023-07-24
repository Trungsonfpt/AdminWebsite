<?php
namespace App\Models;
class User extends BaseModel {
    protected $table = 'user';
    public function getUser(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addUser($id,$name,$age,$address,$email) {
        $sql = "insert into $this->table values (?,?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$age,$address,$email]);
    }
    public function getDetailUser($id){
        $sql = "select * from $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateUser($id,$name,$age,$address,$email){
        $sql= "UPDATE $this->table SET name=?,age=?,address=?,email=? WHERE id=?";
        $this->setQuery($sql);
        return $this ->execute([$name,$age,$address,$email,$id]);
    }
    public function deleteUser($id) {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }


}