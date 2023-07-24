<?php
namespace App\Controllers;
use App\Models\Comment;

class CommentController extends BaseController
{
    public $Comment;
    public function __construct()
    {
        $this->Comment= new Comment();
    }
    public function getComment(){
        $list = $this->Comment->getComment();
        $this->render('comment.list',compact('list'));
    }
    public function editComment($id){
        $comment = $this->Comment->getDetailComment($id);
        $this->render('comment.edit',compact('comment'));
    }
    public function editCommentPost($id){
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['username'])) {
                $errors[] = "Không được bỏ trống tên người dùng";
            }
            if (empty($_POST['content'])) {
                $errors[] = "Không được bỏ trống nội dung";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-comment/'.$id);
            } else {
                $result = $this->Comment->updateComment($id, $_POST['username'], $_POST['content']);
                if ($result) {
                    redirect('edit-success', 'Sửa comment thành công', 'edit-comment/'.$id);
                }
            }
        }
    }
    public function deleteComment($id){
        $result=$this->Comment->deleteComment($id);
        if ($result) {
            redirect('success','Xoa sản phẩm thành công','comment');
        }
    }
}