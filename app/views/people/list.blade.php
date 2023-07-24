@extends('layout.main')
@section('content')
    <a href="{{route('add-people')}}"><button class="themsp"> Thêm nhân viên</button></a><br>
<table border="1" width="100%"  >

    <tr>
        <td>ID</td>
        <td>Tên nhân viên</td>
        <td>Tuổi</td>
        <td>Giới tính</td>
        <td>Hành động</td>
    </tr>
    @foreach($list as $pr)
    <tr>
        <td>{{$pr ->id}}</td>
        <td>{{$pr ->name}}</td>
        <td>{{$pr ->age}}</td>
        <td>{{$pr ->sex}}</td>
        <td>
            <a href="{{route('edit-people/'.$pr->id)}}"><button class="xssp"> Sửa</button></a>
            <a href="{{route('delete-people/'.$pr->id)}}"><button class="xssp"> Xóa</button></a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
