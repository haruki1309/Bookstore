<!DOCTYPE html>
<html>
<head>
	<title>Thông tin thanh toán</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css\Client\delivery.css')}}">
	<link rel="icon" type="image/icon" href="{!!url('asset/icon.ico')!!}" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
</head>
<body>
	<div class="nav">
		<a class="logo" href="{{url('/homepage')}}">
			<img src="{!!url('asset/BlueLogo.png')!!}" alt="#">
		</a>
		<div class="phone-wrap">
			<div class="phone-detail-wrap">
				<div class="phone-number">
					1900-1234
				</div>
				<div class="description">
					8-21h, cả T7 & CN
				</div>
			</div>
			<div class="phone-icon-wrap">
				<i class="fas fa-phone"></i>
			</div>
		</div>
	</div>

	<div class="content">
		<form class="fieldset-wrap" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="title">1. Chọn hình thức giao hàng</div>
			<div class="sel-wrap">
			  	<fieldset id="delivery-fieldset">
			  		@for($i = 0; $i < count($methodDelivery); $i++)
				    <div class="radio-wrap">
				    	@if($i == 0)
				    	<input type="radio" name="deliveryfieldset" checked="checked" value="{{$methodDelivery[$i]->id}}">
				    	@else
				    	<input type="radio" name="deliveryfieldset" value="{{$methodDelivery[$i]->id}}">
				    	@endif
				    	<span>{{$methodDelivery[$i]->method_name.' (Dự kiến giao hàng sau '.$methodDelivery[$i]->es_date.' ngày) chỉ '.$methodDelivery[$i]->delivery_fee.' ₫.'}}</span>
				    </div>
				    @endfor
			  	</fieldset>
			</div>

			<div class="title">2. Chọn hình thức thanh toán</div>
			<div class="sel-wrap">
			  	<fieldset id="payment-fieldset">
			  		@for($i = 0; $i < count($methodPayment); $i++)
				    <div class="radio-wrap">
				    	@if($i == 0)
				    	<input type="radio" name="paymentfieldset" checked="checked" value="{{$methodPayment[$i]->id}}">
				    	@else
				    	<input type="radio" name="paymentfieldset" value="{{$methodPayment[$i]->id}}">
				    	@endif
				    	<span>{{$methodPayment[$i]->method_name}}</span>
				    </div>
				    @endfor
			  	</fieldset>
			</div>

			<button type="submit" class="control-wrap">
				Đặt Mua
			</button>
		</form>

		<div class="bill-info">
			<div class="div-wrap">
				<div class="name-control">
					<span>Địa chỉ giao hàng</span>
					<a href="{{url('checkout/shipping-info')}}">Sửa</a>
				</div>
				<div class="receiver-name">
					{{$address->receiver_name}}
				</div>
				<div class="address">
					{{'Địa chỉ: '.$address->address}}
				</div>
				<div class="phone">
					{{'SĐT: '.$address->phone_number}}
				</div>
			</div>
			<div class="div-wrap">
				<div class="name-control">
					<span>Đơn hàng</span>
					<a href="{{url('checkout/cart')}}">Sửa</a>
				</div>
				<div class="book-list">
					@foreach($cart as $item)
					<div class="row">
						<div class="row-name">
							<span class="qty">
								{{$item->qty.' x'}}
							</span>
							<a href="">
								{{$item->name}}
							</a>
						</div>
						<div class="row-price">
							{{$item->qty * $item->price.' đ'}}
						</div>
					</div>
					@endforeach
				</div>
				<div class="price-wrap">
					<div class="name">Tạm tính</div>
					<div class="temp-price">
						{{Cart::total().' đ'}}
					</div>
				</div>
				<div class="price-wrap">
					<div class="name">Thành tiền</div>
					<div class="pri-price">
						{{Cart::total().' đ'}}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="footer"></div>
</body>
</html>