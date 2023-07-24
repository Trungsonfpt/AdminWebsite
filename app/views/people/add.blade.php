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
    <form action="{{ route('add-people-post') }}" method="POST">
        <p style="font-size: 16px;">Tên nhân viên</p> <input type="text" name="name" autocomplete="off">
        <p style="font-size: 16px;">Tuổi</p> <input type="text" name="age" autocomplete="off">
        <p style="font-size: 16px;">Giới tính</p> <input type="text" name="sex" autocomplete="off"></br>
        <input class="themsp" type="submit" name="them" value="Thêm">
    </form>

    <a href="{{route('people')}}"><button class="themsp">Danh sách</button></a>
@endsection
