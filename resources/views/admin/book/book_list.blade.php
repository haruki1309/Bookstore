<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_book.css')}}">
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
					<a href="" class="btn" id="li-highlight">
						<i class="fas fa-book-open"></i><span>SÁCH</span>
					</a>
					<ul class="sub-list">
						<li class="sub-item"><a href="books/author"><span>TÁC GIẢ</span></a></li>
						<li class="sub-item"><a href="books/translator"><span>DỊCH GIẢ</span></a></li>
						<li class="sub-item"><a href="books/nph"><span>NPH</span></a></li>
						<li class="sub-item"><a href="books/nxb"><span>NXB</span></a></li>
						<li class="sub-item"><a href="books/language"><span>NGÔN NGỮ</span></a></li>
						<li class="sub-item"><a href="books/age"><span>ĐỘ TUỔI</span></a></li>
						<li class="sub-item"><a href="books/topic"><span>CHỦ ĐỀ</span></a></li>
						<li class="sub-item"><a href="books/category"><span>THỂ LOẠI</span></a></li>

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
		<div class="title">QUẢN LÝ SÁCH</div>
		<div class="tool-bar">
			<form action="book-search" method="post" class="search-form" role="search">
				<input type="hidden" name="_token" value="{{csrf_token()}}";>

				<input type="text" name="searchkey" placeholder="Nhập từ khóa...">
				<button type="submit" class="search-btn">Tìm Kiếm</button>
			</form>
			<a href="books/new"><div class="add-btn">Thêm Sách</div></a>
		</div>

		<div class="book-table">
			<table class="book-list">
				<tr>
					<th style="width: 250px;">TÊN SÁCH</th>
					<th style="width: 180px;">TÁC GIẢ</th>
					<th style="width: 100px;">GIÁ BÌA</th>
					<th style="width: 100px;">GIẢM GIÁ</th>
					<th style="width: 100px;">ĐÃ ĐẶT</th>
					<th style="width: 100px;">CÒN LẠI</th>
					<th style="width: 50px;"></th>
				</tr>

				@foreach($allBook as $book)
					<tr>
						<td>{{$book->title}}</td>
						<td>
							@foreach($book->Author as $author)
								<span>{{$author->name}}</span>
							@endforeach
						</td>
						<td>{{$book->price}}</td>
						<td>{{$book->sale}}</td>
						<td>0</td>
						<td>{{$book->inventory_number}}</td>
						<td>
							<a href="books/edit/{{$book->id}}">
								<i class="fas fa-edit"></i>
							</a>
						</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>
</body>
</html>