<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="row" style="min-height: 750px">
        <div class="col-2 text-center border-end shadow-sm" style="background-color: #f5f5f5">
            <img class="p-5" src="https://upload.wikimedia.org/wikipedia/commons/2/20/FPT_Polytechnic.png"
                width="100%" alt="">
            <a class="btn btn-outline-primary my-2" style="max-width: 200px; min-width: 200px;"
                href="{{ route('products.index') }}"><i class="bi bi-box me-2"></i>Quản lý sản phẩm</a>
            <a class="btn btn-outline-primary my-2" style="max-width: 200px; min-width: 200px;"
                href="{{ route('suppliers.index') }}"><i class="bi bi-box me-2"></i>Quản lý thông tin nhà cung cấp</a>
            <a class="btn btn-outline-primary my-2" style="max-width: 200px; min-width: 200px;"
                href="{{ route('orders.index') }}"><i class="bi bi-box me-2"></i>Quản lý đơn hàng</a>
        </div>
        <div class="col-10 px-5 mt-3">
            <div class="border p-3 rounded shadow-sm">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
