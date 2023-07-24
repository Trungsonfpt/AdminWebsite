@extends('layout.main')
@section('content')
<table border="1" width="100%"  >

    <tr>
        <td>ID</td>
        <td>Tên người dùng</td>
        <td>Nội dung</td>
        <td>Hành động</td>
    </tr>
    @foreach($list as $pr)
    <tr>
        <td>{{$pr ->id}}</td>
        <td>{{$pr ->username}}</td>
        <td>{{$pr ->content}}</td>
        <td>
            <a href="{{route('edit-comment/'.$pr->id)}}"><button class="xssp"> Sửa</button></a>
            <a href="{{route('delete-comment/'.$pr->id)}}"><button class="xssp"> Xóa</button></a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
