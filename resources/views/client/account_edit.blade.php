@extends('client.master')

@section('title')
    BookStore | Homepage
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css\Client\account_edit.css')}}">
	<script type="text/javascript" src="{{asset('js\Client\account_edit.js')}}"></script>
	<div class="title">
		Thông tin tài khoản
	</div>

	<div class="form-wrap">
		@if(count($errors) > 0)
		<div class="err">
			<ul>
				@foreach($errors->all() as $err)
				<li>{{$err}}</li>
				@endforeach
			</ul>
		</div>
		@endif
		@if(session('error'))
		<div class="err">
			{{session('error')}}
		</div>
		@endif

		@if(session('notify'))
		<div class="notify">
			{{session('notify')}}
		</div>
		@endif
		<form method="POST" action="{{url('account/edit')}}" autocomplete="off" id="form-edit-info" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="form-row">
				<div class="input-label">
					Họ tên
				</div>
				<div class="input-wrap">
					<input class="ip-txt" type="text" name="name" value="{{$user->name}}">
				</div>
			</div>
			<div class="form-row">
				<div class="input-label">
					Số điện thoại
				</div>
				<div class="input-wrap">
					<input class="ip-txt" type="text" name="phone" value="{{$user->phone}}">
				</div>
			</div>
			<div class="form-row">
				<div class="input-label">
					Email
				</div>
				<div class="input-wrap">
					<input class="ip-txt" type="text" name="email" disabled="disabled" value="{{$user->email}}">
				</div>
			</div>
			<div class="form-row">
				<div class="input-label">
				</div>
				<div class="input-wrap">
					<input id="ip-chk" type="checkbox" name="chk_ChangePass" val="uncheck">
					<span>Đổi mật khẩu</span>
				</div>
			</div>

			<div class="change-pass-wrap">
				<div class="form-row">
					<div class="input-label">
						Mật khẩu cũ
					</div>
					<div class="input-wrap">
						<input class="ip-txt" type="password" name="oldPass">
					</div>
				</div>
				<div class="form-row">
					<div class="input-label">
						Mật khẩu mới
					</div>
					<div class="input-wrap">
						<input class="ip-txt" type="password" name="newPass">
					</div>
				</div>
				<div class="form-row">
					<div class="input-label">
						Nhập lại
					</div>
					<div class="input-wrap">
						<input class="ip-txt" type="password" name="confirmPass">
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="input-label">
				</div>
				<div class="input-wrap">
					<button type="submit" id="btnChangeInfo">Cập nhật</button>
				</div>
			</div>
		</form>
	</div>
</div>

@stop