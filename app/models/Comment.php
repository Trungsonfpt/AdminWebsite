<?php
namespace App\Models;
class Comment extends BaseModel {
    protected $table = 'Comment';
    public function getComment(){
        $sql = "select * from $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function addComment($id,$username,$content) {
        $sql = "insert into $this->table values (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$id,$username,$content]);
    }
    public function getDetailComment($id){
        $sql = "select * from $this->table where id=?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateComment($id,$username,$content){
        $sql= "UPDATE $this->table SET username=?, content=? WHERE id=?";
        $this->setQuery($sql);
        return $this ->execute([$username,$content,$id]);
    }
    public function deleteComment($id) {
        $sql = "delete from $this->table where id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }


}