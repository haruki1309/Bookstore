@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_comment.css')}}">
	<div class="title">NHẬN XÉT</div>

	<div class="comment-list">
		@foreach($comments as $comment)
		<div class="comment-row">
			<div class="comment-item">
				<div class="book-div">
					<img src="{!!url('1234_db_img/'.$comment->Book->Picture[0]->link)!!}" alt="book img">
					<div class="book-info">
						<div class="book-name">{{$comment->Book->title}}</div>
						<div class="author-name">{{$comment->Book->Author[0]->name}}</div>
					</div>
				</div>
				<div class="comment-div">
					<div class="user">{{$comment->User->name}}</div>
					<div class="rating">{{$comment->stars.' / 5'}}</div>
					<div class="comment-title">{{$comment->title}}</div>
					<div class="comment-content">{{$comment->comment}}</div>
					<div class="date">{{$comment->created_at}}</div>
				</div>
			</div>
			<div class="comment-control">
				@if(!$comment->is_moderated)
				<a href="{{url('admin/comments/accept/'.$comment->id)}}" class="btnAccept">Duyệt nhận xét này</a>
				@endif
				<a href="{{url('admin/comments/delete/'.$comment->id)}}" class="btnDelete">Xóa nhận xét này</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
@stop