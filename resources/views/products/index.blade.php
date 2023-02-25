<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Products List</h2>
                </div>
                
            </div>
        </div>
        @foreach (['danger', 'success'] as $status)
			@if(Session::has($status))
				<p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
			@endif
		@endforeach
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>USD : {{ $product->price }}</td>
                        <td>
                                <a class="btn btn-primary" href="{{ route('product.details',$product->id) }}">Buy Now</a>
                           
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
        
    </div>
</body>
</html>