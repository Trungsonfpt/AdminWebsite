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
    <form action="{{ route('edit-comment-post/'.$comment->id) }}" method="POST">

        <p style="font-size: 16px;">Tên người dùng</p>  <input type="text" name="username" value="{{$comment->username}}"></br>
        <p style="font-size: 16px;"> Nội dung</p> <input type="text" name="content" value="{{$comment->content}}"></br>
        <input type="submit" name="sua" value="Sửa">
    </form>
    <a href="{{route('comment')}}"><button class="themsp">Danh sách</button></a>
@endsection
