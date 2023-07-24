<?php
namespace App\Controllers;
use eftec\bladeone\BladeOne;
class BaseController{

    protected function render($viewFile, $data = []){
        $viewDir = "./app/views"; // Đường dẫn trỏ đến views
        $storageDir = "./storage"; // Thư mục Storage được tạo cùng cấp với app
        $blade = new BladeOne($viewDir,$storageDir, BladeOne::MODE_DEBUG);
        echo $blade->run($viewFile, $data);
    }
}

?>