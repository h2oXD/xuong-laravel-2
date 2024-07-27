@extends('admin.master')
@section('title')
    Danh sách đơn hàng
@endsection
@section('content')
    <h3>Danh sách đơn hàng</h3>
    <a class="btn btn-success mb-3" href="{{route('orders.create')}}">Thêm mới đơn hàng</a>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Customer</th>
            <th>Total</th>
            <th>Created At</th>
        </tr>
        @foreach ($orders as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->c_name}}</td>
                <td>{{$item->total}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection
