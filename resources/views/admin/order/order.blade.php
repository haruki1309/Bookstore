@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_order.css')}}">
	<script type="text/javascript" src="{{asset('js/admin/order.js')}}"></script>
	<div class="title">ĐƠN HÀNG</div>

	<div class="table-order">
		<div class="control-wrap">
			<div class="tab-item-selected" tab="tab-1" id="tab-item-1">Đang chờ xử lý ({{count($waitingOrder)}})</div>
			<div class="tab-item" tab="tab-2" id="tab-item-2">Đang giao ({{count($shippingOrder)}})</div>
			<div class="tab-item" tab="tab-3" id="tab-item-3">Đã nhận</div>
			<div class="tab-item" tab="tab-4" id="tab-item-4">Hủy</div>
		</div>

		<div class="tab-wrap" id="tab-4">
			<table>
				<tr>
					<th style="width: 40px;">STT</th>
					<th style="width: 200px;">Khách hàng</th>
					<th style="width: 160px;">Người nhận</th>
					<th style="width: 200px;">Địa chỉ</th>
					<th style="width: 100px;">Tổng tiền</th>
					<th style="width: 100px;">Ngày đặt</th>
					<th style="width: 100px;"></th>
				</tr>
				@for($i = 0; $i < count($canceledOrder); $i++)
				<tr>
					<td style="width: 40px;">{{$i + 1}}</td>
					<td style="width: 200px;">{{$canceledOrder[$i]->User->name}}</td>
					<td style="width: 160px;">{{$canceledOrder[$i]->receiver_name}}</td>
					<td style="width: 200px;">{{$canceledOrder[$i]->delivery_address}}</td>
					<td style="width: 100px;">{{$canceledOrder[$i]->total_money}}</td>
					<td style="width: 100px;">{{date_format($canceledOrder[$i]->created_at ,"d/m/Y")}}</td>
					<td style="width: 100px;" class="btnOrderDetail"><a href="{{url('admin/orders/'.$canceledOrder[$i]->id)}}"><i class="fas fa-info-circle"></i>Chi tiết</a></td>
				</tr>
				@endfor
			</table>
		</div>

		<div class="tab-wrap" id="tab-3">
			<table>
				<tr>
					<th style="width: 40px;">STT</th>
					<th style="width: 200px;">Khách hàng</th>
					<th style="width: 160px;">Người nhận</th>
					<th style="width: 200px;">Địa chỉ</th>
					<th style="width: 100px;">Tổng tiền</th>
					<th style="width: 100px;">Ngày đặt</th>
					<th style="width: 100px;"></th>
				</tr>
				@for($i = 0; $i < count($succeedOrder); $i++)
				<tr>
					<td style="width: 40px;">{{$i + 1}}</td>
					<td style="width: 200px;">{{$succeedOrder[$i]->User->name}}</td>
					<td style="width: 160px;">{{$succeedOrder[$i]->receiver_name}}</td>
					<td style="width: 200px;">{{$succeedOrder[$i]->delivery_address}}</td>
					<td style="width: 100px;">{{$succeedOrder[$i]->total_money}}</td>
					<td style="width: 100px;">{{date_format($succeedOrder[$i]->created_at ,"d/m/Y")}}</td>
					<td style="width: 100px;" class="btnOrderDetail"><a href="{{url('admin/orders/'.$succeedOrder[$i]->id)}}"><i class="fas fa-info-circle"></i>Chi tiết</a></td>
				</tr>
				@endfor
			</table>
		</div>

		<div class="tab-wrap" id="tab-2">
			<table>
				<tr>
					<th style="width: 40px;">STT</th>
					<th style="width: 200px;">Khách hàng</th>
					<th style="width: 160px;">Người nhận</th>
					<th style="width: 200px;">Địa chỉ</th>
					<th style="width: 100px;">Tổng tiền</th>
					<th style="width: 100px;">Ngày đặt</th>
					<th style="width: 100px;"></th>
				</tr>
				@for($i = 0; $i < count($shippingOrder); $i++)
				<tr>
					<td style="width: 40px;">{{$i + 1}}</td>
					<td style="width: 200px;">{{$shippingOrder[$i]->User->name}}</td>
					<td style="width: 160px;">{{$shippingOrder[$i]->receiver_name}}</td>
					<td style="width: 200px;">{{$shippingOrder[$i]->delivery_address}}</td>
					<td style="width: 100px;">{{$shippingOrder[$i]->total_money}}</td>
					<td style="width: 100px;">{{date_format($shippingOrder[$i]->created_at ,"d/m/Y")}}</td>
					<td style="width: 100px;" class="btnOrderDetail"><a href="{{url('admin/orders/'.$shippingOrder[$i]->id)}}"><i class="fas fa-info-circle"></i>Chi tiết</a></td>
				</tr>
				@endfor
			</table>
		</div>

		<div class="tab-wrap" id="tab-1">
			<table>
				<tr>
					<th style="width: 40px;">STT</th>
					<th style="width: 200px;">Khách hàng</th>
					<th style="width: 160px;">Người nhận</th>
					<th style="width: 200px;">Địa chỉ</th>
					<th style="width: 100px;">Tổng tiền</th>
					<th style="width: 100px;">Ngày đặt</th>
					<th style="width: 100px;"></th>
				</tr>
				@for($i = 0; $i < count($waitingOrder); $i++)
				<tr>
					<td style="width: 40px;">{{$i + 1}}</td>
					<td style="width: 200px;">{{$waitingOrder[$i]->User->name}}</td>
					<td style="width: 160px;">{{$waitingOrder[$i]->receiver_name}}</td>
					<td style="width: 200px;">{{$waitingOrder[$i]->delivery_address}}</td>
					<td style="width: 100px;">{{$waitingOrder[$i]->total_money}}</td>
					<td style="width: 100px;">{{date_format($waitingOrder[$i]->created_at ,"d/m/Y")}}</td>
					<td style="width: 100px;" class="btnOrderDetail"><a href="{{url('admin/orders/'.$waitingOrder[$i]->id)}}"><i class="fas fa-info-circle"></i>Chi tiết</a></td>
				</tr>
				@endfor
			</table>
		</div>
	</div>
</div>
@stop