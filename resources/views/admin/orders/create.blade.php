@extends('admin.master')
@section('title')
    Thêm mới đơn hàng
@endsection
@section('content')
    <h1>Thêm mới đơn hàng</h1>
    <form action="{{ route('orders.store') }}" method="post" class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @csrf
        <div class="col-12 my-3">
            <label class="form-label" for="">Customer</label>
            <select class="form-select" name="customer_id" id="">
                <option value="">-Chọn-Customer-</option>
                @foreach ($customers as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-12">
            <div>
                <h4>Sản phẩm</h4>
                <div id="render" style=""></div>
                <div class="input-group mb-3">
                    <input disabled type="text" class="form-control">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                        Thêm sản phẩm
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content" style="width: fit-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Chọn sản phẩm</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Supplier</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($products as $item)
                                            <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->s_name }}</td>
                                                <td><input type="checkbox" class="form-check-input border"
                                                        data-id='{{ $item->id }}' id="products"></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id='save' class="btn btn-success"
                                        data-bs-dismiss="modal">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <button class="btn btn-success" type="submit">Thêm mới</button>
            <a class="btn btn-warning" href="{{ route('orders.index') }}">Danh sách</a>
        </div>
    </form>
    <script>
        const Products = document.querySelectorAll('#products');
        const renderView = document.querySelector('#render');
        var arr = [];
        Products.forEach(element => {
            element.addEventListener('click', function(e) {
                if (element.checked == true) {
                    arr.push(element.dataset.id);
                }
                if (element.checked == false) {
                    arr = arr.filter(item => item !== element.dataset.id);
                }
            });
        });
        document.querySelector('#save').addEventListener('click', function(e) {
            arr2 = [];
            for (let i = 0; i < arr.length; i++) {
                arr2.push(`
                <div class='row'>
                    <div class="col-1">
                        <label for="" class='form-label'>ID</label>
                        <input type="text" disabled class='form-control' multiple name="products[]" value="${arr[i]}"><br>
                    </div>
                    <div class="col-6">
                        <label for="" class='form-label'>Quantity</label>
                        <input type="number" class='form-control' name="quantity" id="">
                    </div>
                </div>
                `)
            }
            renderView.innerHTML = arr2.join("");
        })
    </script>
@endsection
