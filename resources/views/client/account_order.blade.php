@extends('client.master')

@section('title')
    BookStore | Homepage
@stop

@section('content')

<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css\Client\account_order.css')}}">
	<div class="title">
		Đơn hàng của tôi
	</div>
	<div class="order-table">
		<table>
			<tr>
				<th class="id">Mã đơn hàng</th>
				<th class="date">Ngày mua</th>
				<th class="bookname">Sản phẩm</th>
				<th class="total">Tổng tiền</th>
				<th class="status">Trạng thái</th>
			</tr>
			@foreach($order as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td>{{$item->created_at->format('d/m/Y')}}</td>
				<td class="bookname-data">
					@for($i = 0; $i < count($item->Book); $i++)
						@if($i == count($item->Book) - 1)
							{{$item->Book[$i]->title}}
						@else
							{{$item->Book[$i]->title.' + '}}
						@endif
					@endfor
				</td>
				<td>{{$item->total_money.' đ'}}</td>
				<td>{{$item->Status->status_name}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</div>

@stop