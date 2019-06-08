@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_order.css')}}">
	<script type="text/javascript" src="{{asset('js/admin/order.js')}}"></script>
	<div class="title">ĐƠN HÀNG</div>


	<div class="order-detail-wrap">
		<div class="order-id">{{'Đơn hàng số '.$order->id}}</div>
		<div class="info-wrap">
			<div class="receiver">
				<div class="row">
					<div>Người nhận:</div>
					<div>{{$order->receiver_name}}</div>
				</div>
				<div class="row">
					<div>Địa chỉ:</div>
					<div>{{$order->delivery_address}}</div>
				</div>
				<div class="row">
					<div>SĐT:</div>
					<div>{{$order->phone_number}}</div>
				</div>
			</div>
			<div class="total">
				<div class="row">
					<div>Tạm tính</div>
					<div>{{($order->total_money - $order->MethodDelivery->delivery_fee).' đ'}}</div>
				</div>
				<div class="row">
					<div>Phí ship</div>
					<div>{{$order->MethodDelivery->delivery_fee.' đ'}}</div>
				</div>
				<div class="row">
					<div>Tổng cộng</div>
					<div>{{$order->total_money.' đ'}}</div>
				</div>
			</div>
		</div>
		<div class="book-list">
			<table>
				<tr>
					<th style="width: 60px;">STT</th>
					<th style="width: 200px;">Tên sách</th>
					<th style="width: 60px;">Số lượng</th>
					<th style="width: 60px;">Đơn giá</th>
					<th style="width: 60px;">Thành tiền</th>
				</tr>
				@for($i = 0; $i < count($order->Book); $i++)
				<tr>
					<td style="width: 60px;">{{$i + 1}}</td>
					<td style="width: 200px;">{{$order->Book[$i]->title}}</td>
					<td style="width: 60px;">{{$order->Book[$i]->pivot->amount}}</td>
					<td style="width: 60px;">{{$order->Book[$i]->pivot->price}}</td>
					<td style="width: 60px;">{{$order->Book[$i]->pivot->amount * $order->Book[$i]->pivot->price}}</td>
				</tr>
				@endfor
			</table>
		</div>
		<div class="btn-wrap">
			@switch($order->status_id)
				@case(1)
				<a href="{{url('admin/orders/'.$order->id).'/shipping'}}">Tiến hành vận chuyển</a>
				@break

				@case(2)
				<a href="{{url('admin/orders/'.$order->id).'/succeed'}}">Thành công</a>
				@break
			@endswitch
		</div>
	</div>
</div>
@stop