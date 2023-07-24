@extends('layout.main')
@section('content')
    <a href="{{route('add-user')}}"><button class="themsp"> Thêm khách hàng</button></a><br>
<table border="1" width="100%"  >

    <tr>
        <td>ID</td>
        <td>Tên khách hàng</td>
        <td>Tuổi</td>
        <td>Địa chỉ</td>
        <td>Email</td>
        <td>Hành động</td>
    </tr>
    @foreach($list as $pr)
    <tr>
        <td>{{$pr ->id}}</td>
        <td>{{$pr ->name}}</td>
        <td>{{$pr ->age}}</td>
        <td>{{$pr ->address}}</td>
        <td>{{$pr ->email}}</td>
        <td>
            <a href="{{route('edit-user/'.$pr->id)}}"><button class="xssp"> Sửa</button></a>
            <a href="{{route('delete-user/'.$pr->id)}}"><button class="xssp"> Xóa</button></a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
