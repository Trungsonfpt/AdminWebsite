@extends('layout.main')
@section('content')
    <a href="{{route('add-category')}}"><button class="themsp"> Thêm danh mục</button></a><br>
<table border="1" width="100%"  >

    <tr>
        <td>ID</td>
        <td>Tên danh mục</td>
        <td>Hành động</td>
    </tr>
    @foreach($list as $pr)
    <tr>
        <td>{{$pr ->id}}</td>
        <td>{{$pr ->name}}</td>
        <td>
            <a href="{{route('edit-category/'.$pr->id)}}"><button class="xssp"> Sửa</button></a>
            <a href="{{route('delete-category/'.$pr->id)}}"><button class="xssp"> Xóa</button></a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
