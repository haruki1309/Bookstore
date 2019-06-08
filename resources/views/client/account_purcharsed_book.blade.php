@extends('client.master')

@section('title')
    BookStore | Homepage
@stop

@section('content')

<div class="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css\Client\account_purcharsed.css')}}">
	<div class="title">
		Sách đã mua
	</div>
	<div class="list-book-wrap">
		<div class="grid-book">
			@foreach($books as $book)
			<div class="book-wrap">
				<div class="img-wrap">
					<img src="{!!url('/1234_db_img/'.$book->Picture[0]->link)!!}" alt="book image">
				</div>
				<div class="book-name">{{$book->title}}</div>
				<a href="{{url('/book/'.$book->id.'#book-comment')}}" target="_blank">Viết nhận xét</a>
			</div>
			@endforeach
		</div>
	</div>
</div>

@stop