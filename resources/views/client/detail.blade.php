@extends('client.master')

@section('title')
    {{$book->title}}
@stop

@section('content')
<div class="content">
	<script type="text/javascript" src="{{asset('js/client/detail.js')}}"></script>
	<link rel="stylesheet" href="{{asset('css/client/detail.css')}}">
	<div class="book-classify">
		<ul class="ul-classify">
			<li><a href="{!! url('/homepage') !!}">Trang chủ</a></li>
			<li>
				<a href="{{url('/language/'.$book->Language->id)}}">
					{{'Sách '.$book->Language->name}}
				</a>
			</li>
			<li>
				<a href="{{url('/category/'.$book->Category[0]->id)}}">
					{{$book->Category[0]->name}}
				</a>
			</li>
			<li>
				<a href="{{url('/topic/'.$book->Topic[0]->id)}}">
					{{$book->Topic[0]->name}}
				</a>
			</li>
			<li>
				<a href="{{url('/book/'.$book->id)}}">
					{{$book->title}}
				</a>
			</li>
		</ul>
	</div>
	<div class="book-info">
		<div class="book-pic">
			<div class="book-list-pic">
				@for($i = 0; $i < count($book->Picture); $i++)
				<div class="img-item-wrap" id="{{$i + 1}}">
					<img src="{!!url('1234_db_img/'.$book->Picture[0]->link)!!}" alt="a">
				</div>
				@endfor

			</div>
			<div class="sel-pic">
				<img src="{!!url('1234_db_img/'.$book->Picture[0]->link)!!}" alt="book image">
			</div>
		</div>
		<div class="book-detail">
			<div class="book-title">
				<div class="book-name">{{$book->title}}</div>
				<div class="book-rating">
					@for($i = 0; $i < $book->rating; $i++)
					<i class="fas fa-star"></i>
					@endfor
					@for($i = 0; $i < 5 - $book->rating; $i++)
					<i class="far fa-star"></i>
					@endfor
				</div>
				<div class="book-author">
					<span>Tác giả:</span>
					@for($i = 0; $i < count($book->Author); $i++)								
							
						@if($i < count($book->Author) - 1)
						<a href="">{{$book->Author[$i]->name}}.' - '</a>
						@else
						<a href="">{{$book->Author[$i]->name}}</a>
						@endif

					@endfor
				</div>
				<div class="book-cover"><span>Loại bìa:</span>{{'Bìa '.$book->book_cover}}</div>
			</div>
			<div class="book-price">
				<div class="price">{{number_format($book->price * (1 - $book->sale / 100))}}<span class="unit">đ</span>
				</div>
				<div class="save">Tiết kiệm:<span class="save">{{$book->sale.'%'}}</span></div>
				<div class="original-price">Giá thị trường:<span>{{$book->price}}</span><span class="unit">đ</span></div>
			</div>
			<div class="book-control">
				<input type="hidden" id="book-id" value="{{$book->id}}">
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<div class="add-book">
					<div class="remove-btn"><i class="fas fa-minus"></i></div>
					<div class="book-number">1</div>
					<div class="add-btn"><i class="fas fa-plus"></i></div>
				</div>

				@if($book->inventory_number > 0)
					@if(Auth::check())
					<div class="add-to-cart" isLogin="true">
						<i class="fas fa-shopping-cart"></i>
						Thêm vào giỏ hàng
					</div>
					@else
					<div class="add-to-cart" isLogin="false">
						<i class="fas fa-shopping-cart"></i>
						Thêm vào giỏ hàng
					</div>
					@endif
				@else
				<div class="disable-sell">Sản phẩm tạm hết hàng</div>
				@endif

				<!-- <div class="add-to-like">
					<i class="far fa-heart"></i>
				</div> -->

			</div>
		</div>
	</div>

	<div class="book-info-wrap">
		<div class="book-info-detail">
			<div class="category">THÔNG TIN CHI TIẾT</div>
			<div class="wrap-table">
				<table class="table-detail">
					<tr>
						<td class="col-name">NPH</td>
						<td><a href="">{{$book->Publisher->name}}</a></td>
					</tr>
					<tr>
						<td class="col-name">NXB</td>
						<td><a href="">{{$book->PublishingCompany->name}}</a></td>
					</tr>
					<tr>
						<td class="col-name">Năm XB</td>
						<td>{{$book->publishing_year}}</td>
					</tr>
					<tr>
						<td class="col-name">Tác giả</td>
						<td>
							@for($i = 0; $i < count($book->Author); $i++)								
							
							@if($i < count($book->Author) - 1)
							<a href="">{{$book->Author[$i]->name}}.' - '</a>
							@else
							<a href="">{{$book->Author[$i]->name}}</a>
							@endif

							@endfor
						</td>
					</tr>
					<tr>
						<td class="col-name">Dịch giả</td>
						<td>
							@for($i = 0; $i < count($book->Translator); $i++)	

							@if($i < count($book->Translator) - 1)
							<a href="">{{$book->Translator[$i]->name.' - '}}</a>
							@else
							<a href="">{{$book->Translator[$i]->name}}</a>
							@endif
							
							@endfor
						</td>
					</tr>
					<tr>
						<td class="col-name">Kích thước</td>
						<td>{{$book->book_cover_size}}</td>
					</tr>
					<tr>
						<td class="col-name">Loại bìa</td>
						<td>{{'Bìa '.$book->book_cover}}</td>
					</tr>
					<tr>
						<td class="col-name">Số trang</td>
						<td>{{$book->number_of_pages}}</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="book-description">
			<div class="category">MÔ TẢ</div>
			<div class="description">
				{!! $book->introduction !!};
			</div>
		</div>
	</div>
	<div class="question">
		<div class="category">HỎI ĐÁP VỀ SẢN PHẨM</div>
		<div class="question-wrap">
			@foreach($questions as $question)
			<div class="question-row">
				<div class="icon">
					<i class="fas fa-question-circle"></i>
				</div>
				<div class="quest">
					<div class="question-content">
						{{$question->ask_details}}
					</div>
					<div class="answer-content">
						{{$question->answer_details}}
					</div>
					<div class="answer-day">
						{{'Đã trả lời vào '.$question->time_answer}}
					</div>
				</div>
			</div>
			@endforeach

			<div class="post-quest">
				<form id="question-form" action="{{url('book/'.$book->id.'/send-quest')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="input-wrap">
						<input type="text" name="question">	
					</div>
					@if(Auth::check())
					<button id="btnQuest" type="submit" isLogin="true">Gửi câu hỏi</button>
					@else
					<button id="btnQuest" type="button" isLogin="false">Gửi câu hỏi</button>
					@endif
				</form>
			</div>			
		</div>
		<div id="book-comment">
			<div class="category">KHÁCH HÀNG NHẬN XÉT</div>
			<div class="comment-session">
				<div class="rating-session">
					<div class="rating">
						<div class="title">Đánh giá trung bình</div>
						<div class="rating-score">
							{{$book->rating.'/5'}}
						</div>
						<div class="rating-star">
							@for($i = 0; $i < $book->rating; $i++)
							<i class="fas fa-star"></i>
							@endfor
							@for($i = 0; $i < 5 - $book->rating; $i++)
							<i class="far fa-star"></i>
							@endfor
						</div>
						<div class="count-comment">
							{{'('.count($comments).' nhận xét)'}}
						</div>
					</div>
					<div class="share-comment">
						<div>Chia sẻ nhận xét về sản phẩm</div>
						@if(Auth::check())
						<div id="btnShareComment" isClosing="true" isLogin="true">Viết nhận xét của bạn</div>
						@else
						<div id="btnShareComment" isClosing="true" isLogin="false">Viết nhận xét của bạn</div>
						@endif
					</div>
				</div>
				<div class="comment-form">
					<form id="comment-form" action="{{url('book/'.$book->id.'/send-comment')}}" method="POST" autocomplete="off" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{csrf_token()}}">
						<div class="title">
							GỬI NHẬN XÉT CỦA BẠN
						</div>
						<div class="input-wrap">
							<div class="label">
								1. Đánh giá của bạn về sản phẩm này:
							</div>
							<div class="rating">
								<i class="fas fa-star" id="star-1"></i>
								<i class="far fa-star" id="star-2"></i>
								<i class="far fa-star" id="star-3"></i>
								<i class="far fa-star" id="star-4"></i>
								<i class="far fa-star" id="star-5"></i>
							</div>
							<div class="input-wrap">
								<input type="hidden" name="starCount" value="1" id="star-count">
							</div>
							
						</div>
						<div class="input-wrap">
							<div class="label">
								2. Tiêu đề nhận xét:
							</div>
							<div class="input-wrap">
								<input type="text" name="commentTitle">
							</div>
						</div>
						<div class="input-wrap">
							<div class="label">
								3. Viết nhận xét của bạn vào bên dưới:
							</div>
							<div class="textarea-wrap">
								<textarea name="commentContent"></textarea>
							</div>
						</div>
						<button type="submit">Gửi nhận xét</button>
					</form>
				</div>
				<div class="comment-wrap">
					@foreach($comments as $comment)
					<div class="comment-row">
						<div class="user-info">
							<i class="fas fa-user"></i>
							<div class="user-name">
								{{$comment->User->name}}
							</div>
							<div class="comment-day">
								{{$comment->created_at}}
							</div>
						</div>
						<div class="comment-info">
							<div class="title">
								{{$comment->title}}
							</div>
							<div class="rating">
								@for($i = 0; $i < $comment->stars; $i++)
								<i class="fas fa-star"></i>
								@endfor
								@for($i = 0; $i < 5 - $comment->stars; $i++)
								<i class="far fa-star"></i>
								@endfor
								
							</div>
							<div class="comment">
								{{$comment->comment}}
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@stop