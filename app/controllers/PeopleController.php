<?php
namespace App\Controllers;
use App\Models\People;

class PeopleController extends BaseController
{
    public $People;
    public function __construct()
    {
        $this->People= new People();
    }
    public function getPeople(){
        $list = $this->People->getPeople();
        $this->render('People.list',compact('list'));
    }
    public function addPeople() {
        $this->render('people.add');
    }
    public function addPeoplePost() {
        if (isset($_POST['them'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Không được bỏ trống tên nhân viên";
            }
            //nếu ng dùng bỏ trống đơn giá
            if (empty($_POST['age'])) {
                $errors[] = "Không được bỏ trống tuổi";
            }
            if (empty($_POST['sex'])) {
                $errors[] = "Không được bỏ trống giới tính";
            }
            if (count($errors) > 0) {
                redirect('errors',$errors,'add-people');
            } else {
                $result = $this->People->addPeople(NULL,$_POST['name'],$_POST['age'],$_POST['sex']);
                if ($result) {
                    redirect('success','Thêm nhân viên thành công','add-people');
                }
            }
        }
    }
    public function editPeople($id){
        $People = $this->People->getDetailPeople($id);
        $this->render('People.edit',compact('People'));
    }
    public function editPeoplePost($id){
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['name'])) {
                $errors[] = "Không được bỏ trống tên nhân viên";
            }
            //nếu ng dùng bỏ trống đơn giá
            if (empty($_POST['age'])) {
                $errors[] = "Không được bỏ trống tuổi";
            }
            if (empty($_POST['sex'])) {
                $errors[] = "Không được bỏ trống giới tính";
            }
            if (count($errors) > 0) {
                redirect('errors',$errors,'edit-people/'.$id);
            } else {
                $result = $this->People->updatePeople($id,$_POST['name'],$_POST['age'],$_POST['sex']);
                if ($result) {
                    redirect('edit-success', 'Sửa thông tin nhân viên thành công', 'edit-people/'.$id);
                }
            }
        }
    }
    public function deletePeople($id){
        $result=$this->People->deletePeople($id);
        if ($result) {
            redirect('','','people');
        }
    }
}
