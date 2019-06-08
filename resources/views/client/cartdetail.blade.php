@extends('client.master')

@section('title')
    BookStore | Checkout
@stop

@section('content')
<div id="content">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Client/cart.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/Client/book.css')}}">
	<script type="text/javascript" src="{{asset('js/client/cart.js')}}"></script>
	<div id="category-name">
		{{'GIỎ HÀNG ('.Cart::count().' SẢN PHẨM)'}}
	</div>
	@if(Cart::count() == 0)
	<div id="noBooksCart">
	    <div>
	    	<i class="fas fa-cart-plus"></i>
		    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
		    <a href="{{url('homepage')}}">Tiếp tục mua sắm</a>
	    </div>
	</div>
	<div id="category-name" style="display: block;">
		CÓ THỂ BẠN THÍCH
	</div>
	<div id="mayLike">        
	    <div id="suggestBooks">
		    @for($i = 0; $i < 5; $i++)

		    <a class="link-wrap" href="">                    
		        <img src="{{asset('asset/TraHoaNuNhaNam.jpg')}}" alt="This is book image">
		        <div class="bookInfo">
		            <div class="bookName">Trà hoa nữ - Nhã Nam</div>
		            <div class="author">Alexandre Dumas con</div>
		            <div class="priceAndOrder">
						<div class="curPrice">
	                        <div class="price">68.000đ</div>
	                        <div class="saleOffInfo">-24%</div>                    
	                    </div>  
	                    <div class="oldPrice">90.000đ</div>                    
		            </div>
		        </div> 
		    </a>

		    @endfor
	    </div>        
	</div>

	<div id="booksCart" style="display: none;">
	    <div id="books">
	        @foreach(Cart::content() as $item)
	        <div class="bookDetail" id="{{$item->rowId}}">
				<meta name="csrf-token" content="{{ csrf_token() }}">
				<input type="hidden" name="rowID" id="item-id" value="{{$item->rowId}}">
	        	<input type="hidden" name="bookID" id="book-id" value="{{$item->id}}">

	            <div class="bookDetailImage">
	                <img src="{{asset('1234_db_img/'.$item->options->get('img'))}}" alt="Đây là hình quyển sách">
	            </div>

	            <div class="bookDetailInfo">
	                <div class="bookName">
	                    <a href="" target="_blank">{{$item->name}}</a>
	                </div>
	                <div class="bookAuthor">
	                    Tác giả: <a href="" target="_blank">{{$item->options->get('author')}}</a>
	                </div>
	                <div class="deleteButton">
	                    <span>Xóa</span>
	                </div>
	            </div>

	            <div class="bookDetailPrice">
	                <div class="currentPrice">
	                    {{$item->price.' đ'}}
	                </div>
	                <div class="saleOffPrice">
	                    <div class="oldPrice">
	                        {{$item->options->get('oldprice').' đ'}}
	                    </div>
	                    <div class="saleOffPercent">
	                        {{'- '.$item->options->get('sale').' %'}}
	                    </div>
	                </div>
	            </div>

	            <div class="bookDetailAmount">
	                <div class="add-book">
						<div class="remove-btn"><i class="fas fa-minus"></i></div>
						<div class="book-number">{{$item->qty}}</div>
						<div class="add-btn"><i class="fas fa-plus"></i></div>
					</div>
	            </div>
	        </div>
	        @endforeach
	    </div>
	    <div id="payingSection">
	        <div id="feeSection">
	            <div id="temporary">
	                <span>Tạm tính:</span> 
	                <span id="temporaryValue">{{Cart::total().' đ'}}</span>
	            </div>

	            <div id="final">
	                <span>Thành tiền:</span>
	                <div>
	                	<span id="finalValue">{{Cart::total().' đ'}}</span>        
	                	<div>(Đã bao gồm VAT)</div>
	                </div>                
	            </div>
	        </div>

	        <a href="{{url('checkout/shipping-info')}}">
	            <div id="orderButton">
	            	Tiến hành đặt hàng
	            </div>
	        </a>
	    </div>
	</div>
	@else
	<div id="noBooksCart" style="display: none;">
	    <div>
	    	<i class="fas fa-cart-plus"></i>
		    <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
		    <a href="{{url('homepage')}}">Tiếp tục mua sắm</a>
	    </div>
	</div>
	<div id="category-name" style="display: none;">
		CÓ THỂ BẠN THÍCH
	</div>
	<div id="mayLike" style="display: none;">        
	    <div id="suggestBooks">
		    @for($i = 0; $i < 5; $i++)

		    <a class="link-wrap" href="">                    
		        <img src="{{asset('asset/TraHoaNuNhaNam.jpg')}}" alt="This is book image">
		        <div class="bookInfo">
		            <div class="bookName">Trà hoa nữ - Nhã Nam</div>
		            <div class="author">Alexandre Dumas con</div>
		            <div class="priceAndOrder">
						<div class="curPrice">
	                        <div class="price">68.000đ</div>
	                        <div class="saleOffInfo">-24%</div>                    
	                    </div>  
	                    <div class="oldPrice">90.000đ</div>                    
		            </div>
		        </div> 
		    </a>

		    @endfor
	    </div>        
	</div>
	<div id="booksCart">
	    <div id="books">
	        @foreach(Cart::content() as $item)
	        <div class="bookDetail" id="{{$item->rowId}}">
	        	<input type="hidden" name="rowID" id="item-id" value="{{$item->rowId}}">
	        	<input type="hidden" name="bookID" id="book-id" value="{{$item->id}}">
				<meta name="csrf-token" content="{{ csrf_token() }}">

	            <div class="bookDetailImage">
	                <img src="{{asset('1234_db_img/'.$item->options->get('img'))}}" alt="Đây là hình quyển sách">
	            </div>

	            <div class="bookDetailInfo">
	                <div class="bookName">
	                    <a href="" target="_blank">{{$item->name}}</a>
	                </div>
	                <div class="bookAuthor">
	                    Tác giả: <a href="" target="_blank">{{$item->options->get('author')}}</a>
	                </div>
	                <div class="deleteButton">
	                    <span>Xóa</span>
	                </div>
	            </div>

	            <div class="bookDetailPrice">
	                <div class="currentPrice">
	                    {{$item->price.' đ'}}
	                </div>
	                <div class="saleOffPrice">
	                    <div class="oldPrice">
	                        {{$item->options->get('oldprice').' đ'}}
	                    </div>
	                    <div class="saleOffPercent">
	                        {{'- '.$item->options->get('sale').' %'}}
	                    </div>
	                </div>
	            </div>

	            <div class="bookDetailAmount">
	                <div class="add-book">
						<div class="remove-btn"><i class="fas fa-minus"></i></div>
						<div class="book-number">{{$item->qty}}</div>
						<div class="add-btn"><i class="fas fa-plus"></i></div>
					</div>
	            </div>
	        </div>
	        @endforeach
	    </div>
	    <div id="payingSection">
	        <div id="feeSection">
	            <div id="temporary">
	                <span>Tạm tính:</span> 
	                <span id="temporaryValue">{{Cart::total().' đ'}}</span>
	            </div>

	            <div id="final">
	                <span>Thành tiền:</span>
	                <div>
	                	<span id="finalValue">{{Cart::total().' đ'}}</span>        
	                	<div>(Đã bao gồm VAT)</div>
	                </div>                
	            </div>
	        </div>

	        <a href="{{url('checkout/shipping-info')}}">
	            <div id="orderButton">
	            Tiến hành đặt hàng
	            </div>
	        </a>
	    </div>
	</div>
	@endif

</div>

@stop