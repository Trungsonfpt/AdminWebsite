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
    <form action="{{ route('edit-people-post/'.$People->id) }}" method="POST">

        <p style="font-size: 16px;">Tên nhân viên</p>  <input type="text" name="name" value="{{$People->name}}"></br>
        <p style="font-size: 16px;"> Tuổi</p> <input type="text" name="age" value="{{$People->age}}"></br>
        <p style="font-size: 16px;"> Giới tính</p> <input type="text" name="sex" value="{{$People->sex}}"></br>
        <input type="submit" name="sua" value="Sửa">
    </form>
    <a href="{{route('people')}}"><button class="themsp">Danh sách</button></a>
@endsection
