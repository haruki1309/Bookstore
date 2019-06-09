<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
    <link rel="icon" type="image/icon" href="{!!url('asset/icon.ico')!!}" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <script type="text/javascript" src="{{asset('js/jquery-3.4.0.min.js')}}"></script>
    
</head>
<body>
	<link rel="stylesheet" href="{{asset('css/client/master.css')}}">
	<header>
		<script type="text/javascript" src="{{asset('js/client/menu.js')}}"></script>
    	<script type="text/javascript" src="{{asset('js/client/category_slider.js')}}"></script>

        <div id="account">
            <ul>
                <li>Facebook: <a href="fb.com/iBookS" target=_blank>fb.com/iBookS</a></li>
                <li>Hotline: 01234567889</li>
            </ul>
            <div id="accountInfo">
                <div class="accountBtn">
                    @if(Auth::check())
                    <div class="acc-name">{{Auth::user()->name}}</div>
                    @else
                    <div class="acc-name">Tài khoản</div>
                    @endif
                    <div id="accountIcon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="login-panel">
                    @if(Auth::check())
                    <a class="list-item" href="{{url('account/order-history')}}">Đơn hàng của tôi</a>
                    <a class="list-item" href="{{url('account/edit')}}">Tài khoản của tôi</a>
                    <a class="list-item" href="{{url('account/purcharsed-book')}}">Nhận xét sản phẩm đã mua</a>
                    <!-- <a class="list-item" href="">Sản phẩm yêu thích</a> -->
                    <a id="btn-logout" class="btn" href="{{url('logout')}}">Đăng Xuất</a>
                    @else
                    <button id="btn-login" class="btn" type="button">Đăng Nhập</button>
                    <button id="btn-signin" class="btn" type="button">Đăng Ký</button>
                    @endif 
                </div>
            </div> 

        </div>

        <div id="mainNav">
            <div id="logo">
                <a href="{{url('/homepage')}}"><img src="{!!url('asset/Logo.png')!!}" alt="Logo"></img></a>
            </div>

            <div id="search">
                <form method="POST" action="{{url('/result')}}" autocomplete="off" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="search" name="searchField">                    
                </form>
                <i class="fas fa-search"></i>               
            </div>

            <div id="cart">
                <a href="{{url('checkout/cart')}}">                    
                    <i class="fas fa-shopping-cart"></i>
                    <div id="cartAmount">{{Cart::count()}}</div>
                </a>
            </div>

            <nav>
                <ul>
                    <a href="{{url('/homepage')}}"><li>TRANG CHỦ</li></a>
                    <a href="" id="category-menu"><li>DANH MỤC</li></a>
                    <a href="{{url('/sale-off')}}"><li>KHUYẾN MÃI</li></a>
                    <a href=""><li>LIÊN HỆ</li></a>
                </ul>
            </nav>
        </div>

        <div id="category-li">
            <div class="col">
                <div class="category-name">Tác giả</div>
                @if(isset($menuAuthor))
	                @foreach($menuAuthor as $author)
	                <div class="list-name"><a href="{{url('author/'.$author->id)}}" title="{{$author->name}}">{{$author->name}}</a></div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Dịch giả</div>
                @if(isset($menuTranslator))
	                @foreach($menuTranslator as $translator)
	                <div class="list-name">
                        <a href="{{url('translator/'.$translator->id)}}" title="{{$translator->name}}">
                            {{$translator->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Nhà phát hành</div>
                @if(isset($menuPublisher))
	                @foreach($menuPublisher as $publisher)
	                <div class="list-name">
                        <a href="{{url('publisher/'.$publisher->id)}}" title="{{$publisher->name}}">
                            {{$publisher->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Nhà xuất bản</div>
                @if(isset($menuPublishingCom))
	                @foreach($menuPublishingCom as $publishingCom)
	                <div class="list-name">
                        <a href="{{url('publishingcom/'.$publishingCom->id)}}" title="{{$publishingCom->name}}">
                            {{$publishingCom->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Ngôn ngữ</div>
                @if(isset($menuLanguage))
	                @foreach($menuLanguage as $language)
	                <div class="list-name">
                        <a href="{{url('language/'.$language->id)}}" title="{{$language->name}}">
                            {{$language->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Độ tuổi</div>
                @if(isset($menuAge))
	                @foreach($menuAge as $age)
	                <div class="list-name">
                        <a href="{{url('age/'.$age->id)}}" title="{{$age->name}}">
                            {{$age->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Chủ đề</div>
                @if(isset($menuTopic))
	                @foreach($menuTopic as $topic)
	                <div class="list-name">
                        <a href="{{url('topic/'.$topic->id)}}" title="{{$topic->name}}">
                            {{$topic->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
            <div class="col">
                <div class="category-name">Thể loại</div>
                @if(isset($menuCategory))
	                @foreach($menuCategory as $category)
	                <div class="list-name">
                        <a href="{{url('category/'.$category->id)}}" title="{{$category->name}}">{{$category->name}}
                        </a>
                    </div>
	                @endforeach
                @endif
            </div>
        </div>

        <div class="bg-popup">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="form-wrap" id="form-login">
                <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
                <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
                <button id="form-btn-exit"><i class="fas fa-times"></i></button>
                <div>
                    <div class="form-name">
                        Đăng Nhập
                    </div>
                    <form id="login-form" method="POST" action="{{url('/login')}}" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="book-id" type="hidden" name="bookID" value="-1">
                        <input class="book-qty" type="hidden" name="bookQty" value="0">
                        <div class="input-session">
                            <input type="text" name="email" placeholder="Email">
                        </div>
                        <div class="input-session">    
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        <button class="btn-login" style="top: 120px;" type="submit">Đăng Nhập</button>
                        <button class="btn-signin" style="top: 120px; right: 0px;" type="button">Đăng Kí</button>
                    </form>
                </div>
            </div>

            <div class="form-wrap" id="form-signin">
                <button id="form-btn-exit"><i class="fas fa-times"></i></button>
                <div>
                    <div class="form-name">
                        Đăng Kí
                    </div>
                    <form id="signin-form" method="POST" action="{{url('/signin')}}" autocomplete="off" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input class="book-id" type="hidden" name="bookID" value="-1">
                        <input class="book-qty" type="hidden" name="bookQty" value="0">
                        <div class="input-session">
                            <input type="text" name="name" placeholder="Họ Tên">
                        </div>
                        <div class="input-session">
                            <input type="text" name="phone" placeholder="Số Điện Thoại">
                        </div>
                        <div class="input-session">
                            <input type="text" name="email" placeholder="Email">
                        </div>
                        <div class="input-session">
                            <input type="password" name="password" placeholder="Password">
                        </div>
                        
                        <button class="btn-signin" type="submit">Đăng Kí</button>
                    </form>
                </div>
            </div>
        </div>

        @if(session('notify'))
        <div class="bg">
            <div class="message-wrap">
                <div class="message">
                    <i class="fas fa-check"></i>
                    <span>{{session('notify')}}</span>
                </div>
                <div id="btnNotifyExit">
                    Okay
                </div>
            </div>
        </div>
        @endif
    </header>
	@section('content')
	
	@show

	@section('footer')
	<footer>
    </footer>
	@show
</body>
</html>