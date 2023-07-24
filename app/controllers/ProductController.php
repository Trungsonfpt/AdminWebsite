<?php
namespace App\Controllers;
use App\Models\Product;

class ProductController extends BaseController
{
    public $product;
public function __construct()
{
    $this->product= new Product();
}
public function getProduct(){
    $list = $this->product->getProduct();
    // Hứng được giá trị từ hàm getProduct
    $title = "Danh sách sản phẩm";
    // Gọi view blade và bắn dữ liệu sang view blade
    $tieude= "Trang danh sách sản phẩm";
    $this->render('product.list',compact('title','tieude','list'));
}
    public function addProduct() {
        $this->render('product.add');
    }
    public function addProductPost() {
        if (isset($_POST['them'])) {
            $errors = []; //tạo ra 1 mảng lỗi bằng rỗng
            //nếu ng dùng bỏ trống tên sản phẩm
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            //nếu ng dùng bỏ trống đơn giá
            if (empty($_POST['don_gia'])) {
                $errors[] = "Không được bỏ trống đơn giá";
            }
            if (count($errors) > 0) {
                redirect('errors',$errors,'add-product');
            } else {
                $result = $this->product->addProduct(NULL,$_POST['ten_sp'],$_POST['don_gia']);
                if ($result) {
                    redirect('success','Thêm sản phẩm thành công','add-product');
                }
            }
        }
    }
    public function editProduct($id){
    $product = $this->product->getDetailProduct($id);
    $this->render('product.edit',compact('product'));
    }
    public function editProductPost($id){


        if (isset($_POST['sua'])) {
            $errors = []; //tạo ra 1 mảng lỗi bằng rỗng
            //nếu ng dùng bỏ trống tên sản phẩm
            if (empty($_POST['ten_sp'])) {
                $errors[] = "Không được bỏ trống tên sản phẩm";
            }
            //nếu ng dùng bỏ trống đơn giá
            if (empty($_POST['don_gia'])) {
                $errors[] = "Không được bỏ trống đơn giá";
            }
            if (count($errors) > 0) {
                redirect('errors', $errors, 'edit-product/'.$id);
            } else {
                $result = $this->product->updateProduct($id, $_POST['ten_sp'], $_POST['don_gia']);
                if ($result) {
                    redirect('edit-success', 'Sửa sản phẩm thành công', 'edit-product/'.$id);
                }
            }
        }


    }
    public function deleteProduct($id){
        $result=$this->product->deleteProduct($id);
        if ($result) {
            redirect('','','product');
        }
    }
}