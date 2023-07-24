@extends('layout.main')
@section('content')
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['errors'] as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['success']) && isset($_GET['msg']))
        <span style="color:green;">{{ $_SESSION['success'] }}</span>
    @endif
    <form action="{{ route('add-product-post') }}" method="POST">
        <p style="font-size: 16px;">Tên sản phẩm</p> <input type="text" name="ten_sp" autocomplete="off"></br>
        <p style="font-size: 16px;"> Đơn giá</p> <input type="text" name="don_gia" autocomplete="off"></br>
        <input class="themsp" type="submit" name="them" value="Thêm">
    </form>

    <a href="{{route('product')}}"><button class="themsp">Danh sách</button></a>
@endsection
