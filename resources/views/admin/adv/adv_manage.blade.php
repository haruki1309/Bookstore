@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_adv_manage.css')}}">
	<div class="title">
		<div>QUẢNG CÁO</div>
		<a href="{{url('admin/advertiserment/create')}}">Tạo quảng cáo</a>
	</div>

	<div class="table-adv-wrap">
		<table>
			<tr>
				<th style="width: 60px;">STT</th>
				<th style="width: 300px;">TÊN QUẢNG CÁO</th>
				<th style="width: 300px;">MIÊU TẢ</th>
				<th style="width: 140px;">NGÀY BẮT ĐẦU</th>
				<th style="width: 140px;">NGÀY KẾT THÚC</th>
				<th style="width: 60px;"></th>
				<th style="width: 60px;"></th>
			</tr>
			@for($i = 0; $i < count($advs); $i++)
			<tr>
				<td style="width: 60px;">{{$i + 1}}</td>
				<td style="width: 300px;">{{$advs[$i]->title}}</td>
				<td style="width: 300px;">{{$advs[$i]->detail}}</td>
				<td style="width: 140px;">{{$advs[$i]->startDate}}</td>
				<td style="width: 140px;">{{$advs[$i]->endDate}}</td>
				<td style="width: 60px;">
					<a href="{{url('admin/advertiserment/edit/'.$advs[$i]->id)}}">edit</a>
				</td>
				<td style="width: 60px;">
					<a class="btnEdit" href="{{url('admin/advertiserment/delete/'.$advs[$i]->id)}}">delete</a>
				</td>
			</tr>
			@endfor
		</table>
	</div>
</div>
@stop