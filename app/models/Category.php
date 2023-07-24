<?php
namespace App\Models;
class Category extends BaseModel {
    protected $table = 'category';

    public function getCategory(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addCategory($id,$name) {
        $sql = "insert into $this->table values (?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name]);
    }
    public function getDetailCategory($id){
        $sql = "select * from $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateCategory($id,$name){
        $sql= "UPDATE $this->table SET name=? WHERE id=?";
        $this->setQuery($sql);
        return $this ->execute([$name,$id]);
    }
    public function deleteCategory($id) {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }


}