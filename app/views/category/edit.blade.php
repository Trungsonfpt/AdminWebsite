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
    <form action="{{ route('edit-category-post/'.$category->id) }}" method="POST">

        <p style="font-size: 16px;">Tên danh mục</p>  <input type="text" name="ten_sp" value="{{$category->name}}"></br>
        <input type="submit" name="sua" value="Sửa">
    </form>
    <a href="{{route('category')}}"><button class="themsp">Danh sách</button></a>
@endsection
