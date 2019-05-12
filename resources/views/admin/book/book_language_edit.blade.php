<!DOCTYPE html>
<html>
<head>
	<title>Admin | Book Language</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/book_author.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_menu.css')}}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
	<script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
</head>
<body>
	<div class="nav">
		<div class="logo">
			<img src="{{asset('asset/Logo.png')}}">
		</div>

		<div class="admin-name">
			ADMIN USERNAME
		</div>

		<div class="menu">
			<ul class="parent-list">
				<li class="parent-item">
					<a href="" class="btn">
						<i class="fas fa-tachometer-alt"></i><span>DASHBOARD</span>
					</a>
					
				</li>

				<li class="parent-item">
					<a href="../../books" class="btn" id="li-highlight">
						<i class="fas fa-book-open"></i><span>SÁCH</span>
					</a>
					<ul class="sub-list">
						<li class="sub-item"><a href="../author"><span>TÁC GIẢ</span></a></li>
						<li class="sub-item"><a href="../translator"><span>DỊCH GIẢ</span></a></li>
						<li class="sub-item"><a href="../nph"><span>NPH</span></a></li>
						<li class="sub-item"><a href="../nxb"><span>NXB</span></a></li>
						<li class="sub-item"><a href="../language"><span>NGÔN NGỮ</span></a></li>
						<li class="sub-item"><a href="../age"><span>ĐỘ TUỔI</span></a></li>
						<li class="sub-item"><a href="../topic"><span>CHỦ ĐỀ</span></a></li>
						<li class="sub-item"><a href="../category"><span>THỂ LOẠI</span></a></li>

					</ul>
				</li>

				<li>
					<a href="" class="btn">
						<i class="fas fa-users"></i><span>KHÁCH HÀNG</span>
					</a>
				</li>
				<li>
					<a href="" class="btn">
						<i class="fas fa-file-invoice"></i><span>ĐƠN HÀNG</span>
					</a>
				</li>
				<li>
					<a href="" class="btn">
						<i class="fas fa-ad"></i><span>BANNER</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
	<div class="content">
		<div class="title">NGÔN NGỮ</div>
		<div class="tool-bar">
			<form action="../language-search" method="post" class="search-form" role="search">
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
							<th style="width: 300px;">NGÔN NGỮ</th>
							<th style="width: 50px;"></th>
							<th style="width: 50px;"></th>
						</tr>
						@for($i = 0; $i < count($allLanguage); $i++)
						<tr>
							<td>{{$i + 1}}</td>
							<td>{{$allLanguage[$i]->name}}</td>
							<td>
								<a href="{{$allLanguage[$i]->id}}">
									<i class="fas fa-edit"></i>
								</a>
							</td>
							<td>
								@if(count($allLanguage[$i]->Book) == 0)
								<a href="del/{{$allLanguage[$i]->id}}">
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
				<span>Ngôn ngữ</span>
				<form method="post" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}";>
					<input type="text" name="value" placeholder="Nhập ngôn ngữ" 
					value="{{$edit_language->name}}">
					<button type="submit" class="save">Lưu</button>
				</form>
			</div>
		</div>
		

		
	</div>
</body>
</html>