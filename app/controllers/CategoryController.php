<?php
namespace App\Controllers;
use App\Models\Category;

class CategoryController extends BaseController
{
    public $category;
    public function __construct()
    {
        $this->category= new Category();
    }
    public function getCategory(){
        $list = $this->category->getCategory();
        $this->render('category.list',compact('list'));
    }
    public function addCategory() {
        $this->render('category.add');
    }
    public function addCategoryPost() {
        if (isset($_POST['them'])) {
            $errors = []; //tạo ra 1 mảng lỗi bằng rỗng
            //nếu ng dùng bỏ trống tên sản phẩm
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Không được bỏ trống tên danh mục";
            }
            if (count($errors) > 0) {
                redirect('errors',$errors,'add-category');
            } else {
                $result = $this->category->addCategory(NULL,$_POST['ten_sp']);
                if ($result) {
                    redirect('success','Thêm danh mục thành công','add-category');
                }
            }
        }
    }
    public function editCategory($id){
        $category = $this->category->getDetailCategory($id);
        $this->render('category.edit',compact('category'));
    }
    public function editCategoryPost($id){
        if (isset($_POST['sua'])) {
            $errors = [];
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Không được bỏ trống tên danh mục";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-category/'.$id);
            } else {
                $result = $this->category->updateCategory($id, $_POST['ten_sp']);
                if ($result) {
                    redirect('edit-success', 'Sửa danh mục thành công', 'edit-category/'.$id);
                }
            }
        }
    }
    public function deleteCategory($id){
        $result=$this->category->deleteCategory($id);
        if ($result) {
            redirect('success','Xoa sản phẩm thành công','category');
        }
    }
}