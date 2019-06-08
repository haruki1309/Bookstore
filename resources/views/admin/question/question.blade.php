@extends('admin.master')

@section('title')
    BookStore | Admin
@stop

@section('content')
<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Admin/admin_question.css')}}">
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script type="text/javascript" src="{{asset('js/admin/question.js')}}"></script>
	<div class="title">CÂU HỎI</div>

	<div class="question-list">
		@foreach($questions as $question)
		<div class="question-row">
			<div class="book-div">
				<img src="{!!url('1234_db_img/'.$question->Book->Picture[0]->link)!!}" alt="book img">
				<div class="book-info">
					<div class="book-name">{{$question->Book->title}}</div>
					<div class="author-name">{{$question->Book->Author[0]->name}}</div>
				</div>
			</div>
			<div class="question-div">
				<div class="user">{{$question->User->name}}</div>
				<div class="date">{{$question->time_ask}}</div>
				<div class="question">{{$question->ask_details}}</div>

				<form method="post" action="{{url('admin/questions/'.$question->id.'/answer')}}" id="form-answer">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<textarea class="answer" name="answer"></textarea>
					<button id="btn-answer" type="submit">Trả lời</button>
					<a id="btn-delete" href="{{url('admin/questions/'.$question->id.'/delete')}}">Xóa câu hỏi này</a>
				</form>
			</div>
		</div>
		@endforeach
	</div>
</div>
@stop