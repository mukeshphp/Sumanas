<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Product Details</h2>
                </div>
                
            </div>
        </div>
        <table class="table table-bordered">
            
            <tbody>
               
                    <tr>
                        <td nowrap>Product Name : </td>
                        <td>{{ $productInfo->name }}</td>
                    </tr>
                  <tr>
                        <td>Product Price : </td>
                        <td>USD {{ $productInfo->price }}</td>
                    </tr>
					<tr>
                        <td>Product Price : </td>
                        <td>{{ $productInfo->description }}</td>
                    </tr>
            </tbody>
        </table>
		<article class="card">
                <div class="card-body p-5">
                    <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                            <i class="fa fa-credit-card"></i> Payment with Credit Card</a>
                        </li>
                    </ul>

         <div class="tab-content">
                        <div class="tab-pane fade show active" id="nav-tab-card">
                            @foreach (['danger', 'success'] as $status)
                                @if(Session::has($status))
                                    <p class="alert alert-{{$status}}">{{ Session::get($status) }}</p>
                                @endif
                            @endforeach
                            <form role="form" method="POST" id="paymentForm" action="{{ url('/payment')}}">
                                <div id="card-element">
								@csrf
                                <div class="form-group">
                                    <label for="username">Full name (on the card)</label>
                                    <input type="text" class="form-control" name="fullName" placeholder="Full Name">
                                </div>
                                <div class="form-group">
                                    <label for="cardNumber">Card number</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="cardNumber" placeholder="Card Number">
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                            <i class="fab fa-cc-visa fa-lg pr-1"></i>
                                            <i class="fab fa-cc-amex fa-lg pr-1"></i>
                                            <i class="fab fa-cc-mastercard fa-lg"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">Expiration</span> </label>
                                            <div class="input-group">
                                                <select class="form-control" name="month">
                                                    <option value="">MM</option>
                                                    @foreach(range(1, 12) as $month)
                                                        <option value="{{$month}}">{{$month}}</option>
                                                    @endforeach
                                                </select>
                                                <select class="form-control" name="year">
                                                    <option value="">YYYY</option>
                                                    @foreach(range(date('Y'), date('Y') + 10) as $year)
                                                        <option value="{{$year}}">{{$year}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label data-toggle="tooltip" title=""
                                                data-original-title="3 digits code on back side of the card">CVV <i
                                                class="fa fa-question-circle"></i></label>
                                            <input type="number" class="form-control" placeholder="CVV" name="cvv">
                                        </div>
                                    </div>
									</div>
                                </div>
									<div class="col-sm-3">
                                        <div class="form-group">
										<input type="hidden" name="amount" value="{{ $productInfo->price }}">
										<input type="hidden" name="id" value="{{ $productInfo->id }}">
                                            <button class="subscribe btn btn-primary btn-block" type="submit"> Make Payment </button>
                                        </div>
                                    </div>
                            </form>
                        </div>
					</div>
					</article>
                       
    </div>
	
</body>

</html>