@extends('layout.main')
@section('content')
    <a href="{{route('add-product')}}"><button class="themsp"> Thêm sản phẩm</button></a><br>
<table border="1" width="100%"  >

    <tr>
        <td>ID</td>
        <td>Tên sản phẩm</td>
        <td>Đơn giá</td>
        <td>Hành động</td>
    </tr>
    @foreach($list as $pr)
    <tr>
        <td>{{$pr ->id}}</td>
        <td>{{$pr ->ten_sp}}</td>
        <td>{{$pr ->gia}}</td>
        <td>
            <a href="{{route('edit-product/'.$pr->id)}}"><button class="xssp"> Sửa</button></a>
            <a href="{{route('delete-product/'.$pr->id)}}"><button class="xssp"> Xóa</button></a>
        </td>
    </tr>
    @endforeach

</table>
@endsection
