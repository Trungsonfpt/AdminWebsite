<?php

use Phroute\Phroute\RouteCollector;

$url = !isset($_GET['url']) ? "/" : $_GET['url'];

$router = new RouteCollector();

// filter check đăng nhập
$router->filter('auth', function(){
    if(!isset($_SESSION['auth']) || empty($_SESSION['auth'])){
        header('location: ' . BASE_URL . 'login');die;
    }
});


// bắt đầu định nghĩa ra các đường dẫn

// Khu vực cần quan tâm --Start--
$router->get('/', function(){
    return "trang chủ";
});

// Product
$router->get('product', [App\Controllers\ProductController::class, 'getProduct']);
//route này để hiển thị ra view add
$router->get('add-product', [App\Controllers\ProductController::class,'addProduct']);
//route này để thực thi lệnh thêm
$router->post('add-product-post', [App\Controllers\ProductController::class,'addProductPost']);
//route này để hiển thị ra view edit
$router->get('edit-product/{id}', [App\Controllers\ProductController::class,'editProduct']);
//route này để thực thi lệnh sửa
$router->post('edit-product-post/{id}', [App\Controllers\ProductController::class,'editProductPost']);

$router->get('delete-product/{id}', [App\Controllers\ProductController::class,'deleteProduct']);

//Category
$router->get('category', [App\Controllers\CategoryController::class, 'getCategory']);
//route này để hiển thị ra view add
$router->get('add-category', [App\Controllers\CategoryController::class,'addCategory']);
//route này để thực thi lệnh thêm
$router->post('add-category-post', [App\Controllers\CategoryController::class,'addCategoryPost']);
//route này để hiển thị ra view edit
$router->get('edit-category/{id}', [App\Controllers\CategoryController::class,'editCategory']);
//route này để thực thi lệnh sửa
$router->post('edit-category-post/{id}', [App\Controllers\CategoryController::class,'editCategoryPost']);

$router->get('delete-category/{id}', [App\Controllers\CategoryController::class,'deleteCategory']);


//User
$router->get('user', [App\Controllers\UserController::class, 'getUser']);
//route này để hiển thị ra view add
$router->get('add-user', [App\Controllers\UserController::class,'addUser']);
//route này để thực thi lệnh thêm
$router->post('add-user-post', [App\Controllers\UserController::class,'addUserPost']);
//route này để hiển thị ra view edit
$router->get('edit-user/{id}', [App\Controllers\UserController::class,'editUser']);
//route này để thực thi lệnh sửa
$router->post('edit-user-post/{id}', [App\Controllers\UserController::class,'editUserPost']);

$router->get('delete-user/{id}', [App\Controllers\UserController::class,'deleteUser']);

//Comment
$router->get('comment', [App\Controllers\CommentController::class, 'getComment']);
//route này để hiển thị ra view edit
$router->get('edit-comment/{id}', [App\Controllers\CommentController::class,'editComment']);
//route này để thực thi lệnh sửa
$router->post('edit-comment-post/{id}', [App\Controllers\CommentController::class,'editCommentPost']);

$router->get('delete-comment/{id}', [App\Controllers\CommentController::class,'deleteComment']);




//People
$router->get('people', [App\Controllers\PeopleController::class, 'getPeople']);
//route này để hiển thị ra view add
$router->get('add-people', [App\Controllers\PeopleController::class,'addPeople']);
//route này để thực thi lệnh thêm
$router->post('add-people-post', [App\Controllers\PeopleController::class,'addPeoplePost']);
//route này để hiển thị ra view edit
$router->get('edit-people/{id}', [App\Controllers\PeopleController::class,'editPeople']);
//route này để thực thi lệnh sửa
$router->post('edit-people-post/{id}', [App\Controllers\PeopleController::class,'editPeoplePost']);

$router->get('delete-people/{id}', [App\Controllers\PeopleController::class,'deletePeople']);


// Khu vực cần quan --end--

# NB. You can cache the return value from $router->getData() so you don't have to create the routes each request - massive speed gains
$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());

$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $url);

// Print out the value returned from the dispatched function
echo $response;


?>