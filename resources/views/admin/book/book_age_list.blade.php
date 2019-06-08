@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/book_relation.css')}}">
	<div class="title">ĐỘ TUỔI</div>
	<div class="tool-bar">
		<form action="age-search" method="post" class="search-form" role="search">
			<input type="hidden" name="_token" value="{{csrf_token()}}";>
			<input type="text" name="searchkey" placeholder="Nhập từ khóa...">
			<button type="submit" class="search-btn">Tìm Kiếm</button>
		</form>
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

        @if(session('message'))
            <div class="notifications">
                {{session('message')}}<br>
            </div>
        @endif
    </div>
	<div class="content-wrap">
		<div class="author">
			<div class="author-table">
				<table class="author-list">
					<tr>
						<th style="width: 60px;">ID</th>
						<th style="width: 300px;">ĐỘ TUỔI</th>
						<th style="width: 50px;"></th>
						<th style="width: 50px;"></th>
					</tr>
					@for($i = 0; $i < count($allAge); $i++)
					<tr>
						<td>{{$i + 1}}</td>
						<td>{{$allAge[$i]->name}}</td>
						<td>
							<a href="age/{{$allAge[$i]->id}}">
								<i class="fas fa-edit"></i>
							</a>
						</td>
						<td>
							@if(count($allAge[$i]->Book) == 0)
							<a href="age/del/{{$allAge[$i]->id}}">
								<i class="far fa-trash-alt"></i>
							</a>
							@endif
						</td>
					</tr>
					@endfor
					
				</table>						
			</div>
		</div>
		<div class="add-author">
			<span>Độ tuổi</span>
			<form action="age" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}";>
				<input type="text" name="value" placeholder="Nhập độ tuổi">
				<button type="submit" class="save">Lưu</button>
			</form>
		</div>
	</div>	
</div>
@stop