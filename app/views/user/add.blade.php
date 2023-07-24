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
    <form action="{{ route('add-user-post') }}" method="POST">
        <p style="font-size: 16px;">Tên khách hàng</p> <input type="text" name="name" autocomplete="off"></br>
        <p style="font-size: 16px;"> Tuổi</p> <input type="text" name="age" autocomplete="off"></br>
        <p style="font-size: 16px;"> Địa chỉ</p> <input type="text" name="address" autocomplete="off"></br>
        <p style="font-size: 16px;"> Email</p> <input type="text" name="email" autocomplete="off"></br>
        <input class="themsp" type="submit" name="them" value="Thêm">
    </form>

    <a href="{{route('user')}}"><button class="themsp">Danh sách</button></a>
@endsection
