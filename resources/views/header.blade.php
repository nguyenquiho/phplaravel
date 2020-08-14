<div id="header">
		<div class="header-top">
			<div class="container">
				<div class="pull-left auto-width-left">
					<!-- <ul class="top-menu menu-beta l-inline">
						<li><a href=""><i class="fa fa-home"></i> Trang chủ</a></li>
						<li><a href=""><i class="fa fa-phone"></i> Giới thiệu</a></li>
						<li><a href=""><i class="fa fa-phone"></i> Tin tức</a></li>
						<li><a href=""><i class="fa fa-phone"></i> Liên hệ</a></li>
					</ul> -->
					Chào mừng bạn đến với Techfast
				</div>
				<div class="pull-right auto-width-right">
					<ul class="top-details menu-beta l-inline">
						@if(Auth::check())
						<li><a href="{{route('trangcanhan',Auth::user()->id)}}"><i class="fa fa-user"></i>Chào bạn <span class="user-loged">{{Auth::user()->full_name}}</span></a></li>
						<li><a href="{{route('pagethongbao')}}"><i style="font-size:15px" class="fa">&#xf075;</i>&nbsp;Thông báo({{count($notifi)}})</a></li>
						<li><a href="{{route('dangxuat')}}"><span class="glyphicon">&#xe163;</span>&nbsp;&nbsp;Đăng xuất</span></li>

						@else
						<li><a href="{{route('dangki')}}" class="signup-link"><span class="glyphicon">&#xe008;</span> &nbsp;&nbsp;Đăng kí </a></li>
						<li><a href="{{route('dangnhap')}}" class="login-link"><span class="glyphicon">&#xe161;</span> &nbsp;&nbsp;Đăng nhập</a></li>
						@endif
					</ul>

				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-top -->
		<div class="header-body">
			<div class="container beta-relative">
				<div class="pull-left">
					<a href="index" id="logo"><img src="source/assets/dest/images/logo-techfast-laravel.png" width="200px" alt=""></a>
				</div>
				<div class="pull-right beta-components space-left ov">
					<div class="space10">&nbsp;</div>
					<div class="beta-comp">
						<form role="search" method="get" id="searchform" action="{{route('timkiem')}}">
					        <input type="text" value="" name="key" id="s" placeholder="Tìm sản phẩm..." />
					        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
						</form>
					</div>

					<div class="beta-comp">
						
						<div class="cart">
							<div class="beta-select"><i class="fa fa-shopping-cart"></i><span id="cart-detail">(@if(Session::has('cart')){{Session('cart')->totalQty}} sản phẩm
									@else 0 sản phẩm
									@endif
								 )</span> <i class="fa fa-chevron-down"></i></div>
							<div class="beta-dropdown cart-body">
								@if(Session::has('cart'))
								@foreach($product_cart as $product)
								<div class="cart-item">
									<a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}"><i class="fa fa-times"></i></a>
									<div class="media">
										<a class="pull-left" href="#"><img src="source/image/product/{{$product['item']['image']}}" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">{{$product['item']['name']}}</span>
											<!-- <span class="cart-item-options">Size: XS; Colar: Navy</span> -->
											<span class="cart-item-amount"><span>
											@if($product['item']['promotion_price']==0)
											{{number_format($product['item']['unit_price'])}}
											@else {{number_format($product['item']['promotion_price'])}}
											@endif
											.đ</span> X {{$product['qty']}}</span>
										</div>
									</div>
								</div>
								@endforeach
								
								<!-- <div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="source/assets/dest/images/products/cart/2.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

								<div class="cart-item">
									<div class="media">
										<a class="pull-left" href="#"><img src="source/assets/dest/images/products/cart/3.png" alt=""></a>
										<div class="media-body">
											<span class="cart-item-title">Sample Woman Top</span>
											<span class="cart-item-options">Size: XS; Colar: Navy</span>
											<span class="cart-item-amount">1*<span>$49.50</span></span>
										</div>
									</div>
								</div>

 -->
								<div class="cart-caption">
									<div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đồng</span></div>
									<div class="clearfix"></div>

									<div class="center">
										<div class="space10">&nbsp;</div>
										<a href="{{Route('dathang')}}" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
									</div> 
								</div>
								@endif
							</div>
						</div> <!-- .cart -->
						
					</div>
				</div>
				<div class="clearfix"></div>
			</div> <!-- .container -->
		</div> <!-- .header-body -->
		<div class="header-bottom" style="background-color: #0277b8;">
			<div class="container">
				<a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
				<div class="visible-xs clearfix"></div>
				<nav class="main-menu">
					<ul class="l-inline ov">
						<li><a href="{{route('trang-chu')}}">Trang chủ</a></li>
						@foreach($danhmuc as $cat)
						<li><a href="{{route('danhmucsanpham',$cat->id)}}">{{($cat->name)}}</a>
							<ul class="sub-menu">
								@foreach($loai_sp as $type)
								@if(($type->category_id)==($cat->id))
								<li class="list-sub-menu"><a href="{{route('loaisanpham',$type->id)}}">{{($type->name)}}</a>
								</li>
								@endif
								@endforeach
							</ul>
						</li>
						@endforeach
<!-- 						<li><a href="{{route('gioithieu')}}">Giới thiệu</a></li>
						<li><a href="{{route('lienhe')}}">Liên hệ</a></li> -->
					</ul>
					<div class="clearfix"></div>
				</nav>
			</div> <!-- .container -->
		</div> <!-- .header-bottom -->
	</div> <!-- #header -->