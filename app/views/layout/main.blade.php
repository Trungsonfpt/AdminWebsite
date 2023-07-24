<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('layout.style')
    <title>Document</title>
</head>
<body>
<div class="container">
    <header>

        <h1>QUẢN TRỊ WEBSITE</h1>
        <div class="header-main">
            <ul class="menu">
                <li><a href="{{route('product')}}">Quản lý sản phẩm</a></li>
                <li><a href="{{route('user')}}">Quản lý khách hàng </a></li>
                <li><a href="{{route('category')}}">Quản lý danh mục</a></li>
                <li><a href="{{route('comment')}}">Quản lý bình luận</a></li>
                <li><a href="{{route('people')}}">Quản lý nhân viên</a></li>
            </ul>
        </div>
    </header>
    <section class="content">
        @yield('content')
    </section>
    <footer>
        <span>NGUYỄN TRUNG SƠN</span>
    </footer>
</div>
</body>
</html>