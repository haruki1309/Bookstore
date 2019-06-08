<!DOCTYPE html>
<html>
<head>
	<title>Thông tin giao hàng</title>
	<link rel="icon" type="image/icon" href="{!!url('asset/icon.ico')!!}" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/Client/checkout_address.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('css\Client\checkout.css')}}">
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
		<div class="title">
			<span>Địa chỉ giao hàng</span>
			<div id="btnAddNewAddress" isCancel="false">
				<span>Thêm địa chỉ mới</span>
			</div>
		</div>

		<div class="form-address-wrap">
			<form id="address-form" action="{{url('checkout/save-address')}}" method="post" autocomplete="off" enctype="multipart/form-data">
				<input type="hidden" name="addressID" id="addressID" value="0">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="session-input">
					<span class="label">Tên người nhận</span>
					<div class="input-wrap">
						<input type="text" name="receivername" id="receivername">
					</div>
				</div>
				<div class="session-input">
					<span class="label">Số điện thoại</span>
					<div class="input-wrap">
						<input type="text" name="sdt" id="sdt">
					</div>
				</div>
				<div class="session-input">
					<span class="label">Địa chỉ</span>
					<div class="input-wrap">
						<textarea name="address" id="address"></textarea>
					</div>
				</div>
				<div class="session-checkbox">
					<input type="checkbox" name="isDefault" id="chkDefault">
					<span>Đặt làm địa chỉ mặc định</span>
				</div>
				<div class="session-control">
					<button type="submit" id="btnUpdate">Save</button>
				</div>
			</form>
		</div>

		<div class="list-address">
			@foreach($address as $address)
				@if($address->default == 1)
					<div class="address-wrap" isDefault="true" addressID="{{$address->id}}">
						<div class="name-wrap">
							<span class="name">{{$address->receiver_name}}</span>
							<span class="default">Mặc định</span>
						</div>
						<div class="address">
							<span>Địa chỉ: </span>
							<span id="address-content">{{$address->address}}</span>
						</div>
						<div class="phone">
							<span>Điện thoại: </span>
							<span id="phone-content">{{$address->phone_number}}</span>
						</div>
						<div class="control-wrap">
							<a href="{{url('checkout/delivery-info/'.$address->id)}}" id="btnAcept">
								Giao đến địa chỉ này
							</a>
							<div id="btnEdit">
								Sửa
							</div>
						</div>

					</div>
				@else
					<div class="address-wrap" isDefault="false" addressID="{{$address->id}}">
						<div class="name-wrap">
							<span class="name">{{$address->receiver_name}}</span>
						</div>
						<div class="address">
							<span>Địa chỉ: </span>
							<span id="address-content">{{$address->address}}</span>
						</div>
						<div class="phone">
							<span>Điện thoại: </span>
							<span id="phone-content">{{$address->phone_number}}</span>
						</div>
						<div class="control-wrap">
							<a href="" id="btnAcept">
								Giao đến địa chỉ này
							</a>
							<div id="btnEdit">
								Sửa
							</div>
							<a href="{{url('checkout/delete-address/'.$address->id)}}">
								<div id="btnDelete">
									Xóa
								</div>
							</a>
						</div>

					</div>
				@endif
			@endforeach
		</div>
	</div>
	<div class="footer"></div>
</body>
</html>