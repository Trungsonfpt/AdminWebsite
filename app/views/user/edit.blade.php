@extends('layout.main')
@section('content')
    @if(isset($_SESSION['errors']) && isset($_GET['msg']))
        <ul>
            @foreach($_SESSION['errors'] as $error)
                <li style="color: red">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    @if(isset($_SESSION['edit-success']) && isset($_GET['msg']))
        <span style="color:green;">{{ $_SESSION['edit-success'] }}</span>
    @endif
    <form action="{{ route('edit-user-post/'.$user->id) }}" method="POST">

        <p style="font-size: 16px;">Tên khách hàng</p>  <input type="text" name="name" value="{{$user->name}}"></br>
        <p style="font-size: 16px;"> Tuổi </p> <input type="text" name="age" value="{{$user->age}}"></br>
        <p style="font-size: 16px;"> Địa chỉ</p> <input type="text" name="address" value="{{$user->address}}"></br>
        <p style="font-size: 16px;"> Email</p> <input type="text" name="email" value="{{$user->email}}"></br>
        <input type="submit" name="sua" value="Sửa">
    </form>
    <a href="{{route('user')}}"><button class="themsp">Danh sách</button></a>
@endsection
