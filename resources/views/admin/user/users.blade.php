@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_users.css')}}">
	<div class="title">KHÁCH HÀNG</div>
	<div class="table-wrap">
		<table class="book-list">
			<tr>
				<th style="width: 40px;">STT</th>
				<th style="width: 200px;">HỌ TÊN</th>
				<th style="width: 200px;">EMAIL</th>
				<th style="width: 200px;">SĐT</th>
				<th style="width: 200px;">SÁCH ĐÃ MUA</th>
			</tr>
			@for($i = 0; $i < count($users); $i++)
			<tr>
				<td>{{$i + 1}}</td>
				<td>{{$users[$i]->name}}</td>
				<td>{{$users[$i]->email}}</td>
				<td>{{$users[$i]->phone}}</td>
				<td>{{$users[$i]->bought_count}}</td>
			</tr>
			@endfor
	</div>
</div>
@stop