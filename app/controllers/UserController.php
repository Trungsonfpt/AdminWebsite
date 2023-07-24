<?php
namespace App\Controllers;
use App\Models\User;

class UserController extends BaseController
{
    public $User;
    public function __construct()
    {
        $this->User= new User();
    }
    public function getUser(){
        $list = $this->User->getUser();
        $this->render('user.list',compact('list'));
    }
    public function addUser() {
        $this->render('user.add');
    }
    public function addUserPost() {
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Không được bỏ trống tên khách hàng";
            }
            if (empty($_POST['age'])) {
                $errors[] = "Không được bỏ trống tuổi";
            }
            if (empty($_POST['address'])) {
                $errors[] = "Không được bỏ trống địa chỉ";
            }
            if (empty($_POST['email'])) {
                $errors[] = "Không được bỏ trống email";
            }
            if (count($errors) > 0) {
                redirect('errors',$errors,'add-user');
            } else {
                $result = $this->User->addUser(NULL,$_POST['name'],$_POST['age'],$_POST['address'],$_POST['email']);
                if ($result) {
                    redirect('success','Thêm khách hàng thành công','add-user');
                }
            }
        }
    }
    public function editUser($id){
        $user = $this->User->getDetailUser($id);
        $this->render('user.edit',compact('user'));
    }
    public function editUserPost($id){
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Không được bỏ trống tên khách hàng";
            }
            if (empty($_POST['age'])) {
                $errors[] = "Không được bỏ trống tuổi";
            }
            if (empty($_POST['address'])) {
                $errors[] = "Không được bỏ trống địa chỉ";
            }
            if (empty($_POST['email'])) {
                $errors[] = "Không được bỏ trống email";
            }
            if (count($errors) > 0) {
                redirect('errors',$errors,'edit-user/'.$id);
            }else {
                $result = $this->User->updateUser($id, $_POST['name'],$_POST['age'],$_POST['address'],$_POST['email']);
                if ($result) {
                    redirect('edit-success', 'Sửa thông tin thành công', 'edit-user/'.$id);
                }
            }
        }
    }
    public function deleteUser($id){
        $result=$this->User->deleteUser($id);
        if ($result) {
            redirect('','','user');
        }
    }
}