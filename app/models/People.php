<?php
namespace App\Models;
class People extends BaseModel {
    protected $table = 'people';
    public function getPeople(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addPeople($id,$name,$age,$sex) {
        $sql = "insert into $this->table values (?,?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$name,$age,$sex]);
    }
    public function getDetailPeople($id){
        $sql = "select * from $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updatePeople($id,$name,$age,$sex){
        $sql= "UPDATE $this->table SET name=?,age=?,sex=? WHERE id=?";
        $this->setQuery($sql);
        return $this ->execute([$name,$age,$sex,$id]);
    }
    public function deletePeople($id) {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }


}
