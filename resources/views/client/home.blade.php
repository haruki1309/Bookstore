@extends('client.master')

@section('title')
    BookStore | Homepage
@stop

@section('content')
<link rel="stylesheet" href="{{asset('css/client/homepage.css')}}">
<script type="text/javascript" src="{{asset('js/client/slider.js')}}"></script>
<div class="slider">
    <div class="slide">
        @foreach($advs as $adv)
        <a href="{{url('advertiserment/'.$adv->id)}}">
            <div class="img-wrap">
                <img src="{!!url('1234_db_img/advertiserment/'.$adv->image_link)!!}" alt="adv-banner">
            </div>
        </a>
        @endforeach
    </div>

    <div class="next-btn"><i class="fas fa-chevron-right"></i></div>
    <div class="prev-btn"><i class="fas fa-chevron-left"></i></div>
</div>

<div id="content">
    <div id="bestSeller">
        <div id="bestSellerImage">
            @foreach($bestSellerBooks as $book)
            <a href="{{url('/book/'.$book->id)}}">
            	<div class="book-img-wrap">                    
                    <img src="{!!url('/1234_db_img/'.$book->Picture[0]->link)!!}" alt="This is book image">

                    <div class="bookInfo">
                        <div class="bookName">{{$book->title}}</div>
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
                        <div class="priceInfo">
                            <div class="price">{{$book->price * (1 - $book->sale / 100)}}đ</div>
                            <div class="saleOffInfo">- {{$book->sale}}%</div>
                        </div>  
                        <div class="oldPrice">{{$book->price}}đ</div>
                    </div>        
                </div>
            </a>
            @endforeach
        </div>

        <div id="bestSellerInfo">
            <h1>Sách đang bán chạy</h1>
            <p>Khám phá những cuốn sách<br>đang được mọi người tìm đọc nhiều nhất.</br></p>
            <a href="" class="btn-seemore">Xem ngay</a>
        </div>
        
    </div>

    <div id="saleOff">
        <h1>SALE OFF</h1>

        <div id="saleOffImage">
        	@foreach($saleOffBook as $book)
        	<a href="{{url('/book/'.$book->id)}}">
        		<div class="saleOffBook">                    
                    <div class="saleOffPercent">- {{$book->sale}}%</div>
                    <img src="{!!url('/1234_db_img/'.$book->Picture[0]->link)!!}" alt="This is sale off book image">
                    
                    <div class="bookInfo">
                        <div class="bookName">{{$book->title}}</div>
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
                        <div class="priceInfo">
                            <div class="price">{{$book->price * (1 - $book->sale / 100)}}đ</div>
                            <div class="saleOffInfo">- {{$book->sale}}%</div>
                        </div>  
                        <div class="oldPrice">{{$book->price}}đ</div>
                    </div>     
                </div>
        	</a>
        	@endforeach
        </div>        

        <a href="{{url('/sale-off')}}" class="btn-seemore">Xem ngay</a>
    </div>
    @if(Auth::check() && count($recommendBook) > 0)
    <div class="catalog">
        <h2>Sách dành cho bạn</h2>           
        
        <div class="catalogImage">
            <div class="prev-btn"><i class="fas fa-chevron-left"></i></div>

            <div class="slide-wrap" bookNumber="{{count($newBook)}}">
            	<div class="slide">
            		@foreach($recommendBook as $book)
	                <a href="{{url('/book/'.$book->id)}}">
	                	<div class="book-img-wrap">
		                    <img src="{!!url('/1234_db_img/'.$book->Picture[0]->link)!!}" alt="This is catalog book image">

		                    <div class="bookInfo">
		                        <div class="bookName">{{$book->title}}</div>
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
		                        <div class="priceInfo">
		                            <div class="price">{{$book->price * (1 - $book->sale / 100)}}đ</div>
		                            <div class="saleOffInfo">- {{$book->sale}}%</div>
		                        </div>  
		                        <div class="oldPrice">{{$book->price}}đ</div>
		                    </div>  
		                </div>
	                </a>
	                @endforeach
            	</div>
            </div>
            
            <div class="next-btn"><i class="fas fa-chevron-right"></i></div> 
        </div>           
    </div>
    @endif
    <div class="catalog">
        <h2>Sách mới ra mắt</h2>           
        
        <div class="catalogImage">
            <div class="prev-btn"><i class="fas fa-chevron-left"></i></div>

            <div class="slide-wrap" bookNumber="{{count($newBook)}}">
            	<div class="slide" id="1">
            		@foreach($newBook as $book)
	                <a href="{{url('/book/'.$book->id)}}">
	                	<div class="book-img-wrap">
		                    <img src="{!!url('/1234_db_img/'.$book->Picture[0]->link)!!}" alt="This is catalog book image">

		                    <div class="bookInfo">
		                        <div class="bookName">{{$book->title}}</div>
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
		                        <div class="priceInfo">
		                            <div class="price">{{$book->price * (1 - $book->sale / 100)}}đ</div>
		                            <div class="saleOffInfo">- {{$book->sale}}%</div>
		                        </div>  
		                        <div class="oldPrice">{{$book->price}}đ</div>
		                    </div>  
		                </div>
	                </a>
	                @endforeach
            	</div>
            </div>
         
            <div class="next-btn"><i class="fas fa-chevron-right"></i></div> 
        </div> 
    </div>
</div>

@stop