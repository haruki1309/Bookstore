@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_adv_detail.css')}}">
	<script type="text/javascript" src="{{asset('js/admin/advertiserment.js')}}"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div class="title">
		<div>QUẢNG CÁO</div>
	</div>
	<div class="noti-wrapper">
        @if(count($errors) > 0)
            <div class="errors">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li><br>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('bookerror'))
            <div class="errors">
                {{session('bookerror')}}<br>
            </div>
        @endif

        @if(session('message'))
            <div class="notifications">
                {{session('message')}}<br>
            </div>
        @endif
    </div>
	<div class="img-wrap">
		<img src="{!!url('1234_db_img/advertiserment/'.$adv->image_link)!!}" alt="banner">
	</div>

	<div class="search-book">
		<div class="control-wrap">
			<input id="search-input" type="text" name="searchkey" autocomplete="off" placeholder="Tìm kiếm sách thêm sẽ vào quảng cáo">
			<button type="button" id="btnSearchBook">Tìm kiếm</button>
		</div>
		<div class="result-wrap">
			<table id="table-search-result">
			</table>
		</div>
	</div>

	<div class="form-wrap">
		<form class="add-form" method="post" enctype="multipart/form-data" autocomplete="off">
			<div class="col-info">
				<input type="hidden" name="_token" value="{{csrf_token()}}">

				<div class="input-wrap">
					<label>Tiêu đề quảng cáo</label>
					<input type="text" name="title" value="{{$adv->title}}">
				</div>
				<div class="input-wrap">
					<label>Thông tin chi tiết</label>
					<input type="text" name="detail" value="{{$adv->detail}}">
				</div>
				<div class="input-wrap">
					<label>Ngày bắt đầu</label>
					<input type="text" name="startDate" value="{{$adv->startDate}}">
				</div>
				<div class="input-wrap">
					<label>Ngày kết thúc</label>
					<input type="text" name="endDate" value="{{$adv->endDate}}">
				</div>

				<div class="input-wrap">
					<label>Hình ảnh</label>
					<input type="file" name="image">
				</div>

				<button type="submit">Lưu</button>
			</div>
			<div class="col-book-list">
				<table id="table-advertiserment-book">
					<tr>
						<th style="width: 60px;">STT</th>
						<th style="width: 300px;">TÊN SÁCH</th>
						<th style="width: 160px;">GIẢM GIÁ</th>
						<th style="width: 60px;"></th>
					</tr>
					@for($i = 0; $i < count($adv->Book); $i++)
					<tr>
						<td style="width: 60px;">{{$i + 1}}</td>
						<td style="width: 300px;" class="book-name">{{$adv->Book[$i]->title}}</td>
						<td style="width: 160px;">{{$adv->Book[$i]->sale.' %'}}</td>
						<td style='width: 60px;'><i class='fas fa-trash'></i></td>
	                    <input type='hidden' name='bookID[]' value='{{$adv->Book[$i]->id}}'>
					</tr>
					@endfor
				</table>
			</div>
		</form>
	</div>
</div>
@stop