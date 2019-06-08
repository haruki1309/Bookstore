@extends('client.master')

@section('title')
    BookStore | Result
@stop

@section('content')
<link rel="stylesheet" href="{{asset('css/client/result.css')}}">

<div class="content">
	<div id="title">{{$viewName}}</div>
	<div id="result-wrapper">
		<div class="grid-book">
			@foreach($book as $book)
			<a href="{{url('book/'.$book->id)}}">
				<div class="book-wrapper">
					<div class="sale-percent">
						<span>
							- {{$book->sale}}%
						</span>
					</div>
					<div class="img-wrapper">
						<img src="{!!url('/1234_db_img/'.$book->Picture[0]->link)!!}" alt="book img">
					</div>
					<div class="info-wrapper">
						<div class="title">
							{{$book->title}}
						</div>
						<div class="author">
                        	<?php 
                        	$stringName = '';
                        	for($i = 0; $i < count($book->author); $i++){
                        		$stringName = $stringName.$book->author[$i]->name;
                        		if($i < count($book->author) - 1){
                        			$stringName = $stringName." - ";
                        		}  		
                        	}
                        	echo($stringName);
                        	?>
                        </div>
						<div class="price-wrap">
							<span class="price">
								{{$book->price * (1 - $book->sale / 100)}}đ
							</span>
							<span class="percent">
								- {{$book->sale}}%
							</span>
						</div>
						<div class="old-price">
							{{$book->price}}đ
						</div>
					</div>
				</div>
			</a>
			@endforeach
		</div>
	</div>
</div>
@stop