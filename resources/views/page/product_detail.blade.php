	@extends('master')
	@section('content')
		<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="source/assets/dest/js/jquery.exzoom.js"></script>
	<script>
		$(function(){
	  	$("#exzoom").exzoom({

	  });
	});
	</script>
	<div class="inner-header">
		<div class="container">
			<div class="pull-left">
				<!-- <h6 class="inner-title">Sản phẩm {{$sanpham->name}}</h6> -->
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large" >
					<a href="index.html">Trang chủ</a> / <span>
						@foreach($danhmuc as $dm)
						@if($dm->id==$loai->category_id)
						<a href="{{route('danhmucsanpham',$dm->id)}}">{{$dm->name}}</a> / <a href="{{route('loaisanpham',$loai->id)}}">{{$loai->name}}</a> / <a href="{{route('chitietsanpham',$sanpham->id)}}" style="color: tomato">Chi tiết sản phẩm {{$sanpham->name}}</a>
						@endif
						@endforeach
					</span>
				</div> 
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
			<div class="row">
				<div class="col-sm-9" id="col-detail">

					<div class="row">
						<div class="col-sm-4">
							<div class="exzoom" id="exzoom">
							  <div class="exzoom_img_box">
							    <ul class='exzoom_img_ul'>
							      <li><img src="source/image/product/{{$sanpham->image}}" alt=""/></li>
							      <li><img src="source/image/product/{{$sanpham->image}}" alt=""/></li>
							      <li><img src="source/image/product/{{$sanpham->image}}" alt=""/></li>
							      <li><img src="source/image/product/{{$sanpham->image}}" alt=""/></li>
							    </ul>
							  </div>
							  <div class="exzoom_nav"></div>
							  <p class="exzoom_btn">
							      <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
							      <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
							  </p>
							</div>
						</div>
						<!-- trả về data product theo type id -->
						<div class="col-sm-8">
							<div class="single-item-body">
								<p class="single-item-title" id="single-item-title-detail">{{$sanpham->name}}</p>
								<p class="single-item-price" id="single-item-price-detail">
									@if($sanpham->promotion_price==0)
												<span class="flash-sale">{{number_format($sanpham->unit_price)}} .đ</span>
												@else
												<span class="flash-del">{{number_format($sanpham->unit_price)}} .đ</span>
												<span class="flash-sale">{{number_format($sanpham->promotion_price)}} .đ</span>
									@endif
								</p>
							</div>

							<div class="clearfix"></div>
							<div class="space20">&nbsp;</div>

							<div class="single-item-desc">
								<p>{{$sanpham->short_description}}</p>
								<p>Tình trạng: <span style="color: #428bca">Còn hàng</span></p>
							</div>
							<div class="space20">&nbsp;</div>

							<p style="font-weight: bolder;">Số lượng:</p>
							<div class="single-item-options">
								<!-- <select class="wc-select" name="size">
									<option>Size</option>
									<option value="XS">XS</option>
									<option value="S">S</option>
									<option value="M">M</option>
									<option value="L">L</option>
									<option value="XL">XL</option>
								</select>
								<select class="wc-select" name="color">
									<option>Color</option>
									<option value="Red">Red</option>
									<option value="Green">Green</option>
									<option value="Yellow">Yellow</option>
									<option value="Black">Black</option>
									<option value="White">White</option>
								</select> -->
								<form method="get" action="{{route('themgiohang',$sanpham->id)}}">
									<select class="wc-select" name="quantity">
									<option>Chọn</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
								</select>
									<button type="submit" class="add-to-cart" href=""><i class="fa fa-shopping-cart"></i></button>
								</form>
								
								<div class="clearfix"></div>
							</div>
							<div class="space40">&nbsp;</div>
							<div><span>Đánh giá:&nbsp;&nbsp;&nbsp;</span>
									<form method="">
										<button value="1" class="btn-rate-product" id="rate-1"><span class="glyphicon glyphicon-star-empty"></span></button>
										<button value="2" class="btn-rate-product" id="rate-2"><span class="glyphicon glyphicon-star-empty"></span></button>
										<button value="3" class="btn-rate-product" id="rate-3"><span class="glyphicon glyphicon-star-empty"></span></button>
										<button value="4" class="btn-rate-product" id="rate-4"><span class="glyphicon glyphicon-star-empty"></span></button>
										<button value="5" class="btn-rate-product" id="rate-5"><span class="glyphicon glyphicon-star-empty"></span></button>
										
									</form>
							</div>
						</div>
					</div>

					<div class="space40">&nbsp;</div>
					<div class="woocommerce-tabs">
						<ul class="tabs">
							<li><a href="#tab-description">Mô tả</a></li>
							<li><a href="#tab-reviews">Bình luận ({{count($reviews)}})</a></li>
						</ul>

						<div class="panel" id="tab-description">
							<p>{{$sanpham->full_description}}</p>
						</div>
						<div class="panel" id="tab-reviews">
							@foreach($reviews as $re)
							<div class="one-reviews">
								<span class="username-reviews">
									@foreach($user as $us)
										@if($re->id_user == $us->id)
										{{$us->full_name}}
										@endif
									@endforeach
								</span>
								<p class="conten-reviews">
									{{$re->content}}
								</p>
								<span class="created-at-reviews">{{$re->created_at->diffForHumans()}}</span>
							</div>
							@endforeach
							@if(Auth::check())
							<p>Nhập đánh giá</p>
							<form method="post" action="{{route('danhgia',$sanpham->id)}}">
								<input type="hidden" name="_token" value="{{csrf_token()}}">
								<input type="text" name="review" value="" id="txt-review">
								<input type="submit" class="submit-btn-review">
							</form>
							@endif
						</div>
					</div>
					<div class="space20">&nbsp;</div>
					<div class="beta-products-list">
						<h4>Sản phẩm tương tự</h4>

						<div class="row">
							@foreach($sp_tuongtu as $sptt)
							<div class="col-sm-4">
								<div class="single-item">
									<div class="single-item-header">
										<a href="{{route('chitietsanpham',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" style="width: 280px;height: 280px" alt=""></a>
									</div>
									<div class="single-item-body">
										<p class="single-item-title">{{$sptt->name}}</p>
										<p class="single-item-price">
											@if($sanpham->promotion_price==0)
												<span class="flash-sale">{{number_format($sptt->unit_price)}} .đ</span>
												@else
												<span class="flash-del">{{number_format($sptt->unit_price)}} .đ</span>
												<span class="flash-sale">{{number_format($sptt->promotion_price)}} .đ</span>
											@endif
										</p>
									</div>
									<div class="single-item-caption">
										<a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
										<a class="beta-btn primary" href="product.html">Chi tiết <i class="fa fa-chevron-right"></i></a>
										<div class="clearfix"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
						<div class="roư">{{$sp_tuongtu->links()}}</div>
					</div> <!-- .beta-products-list -->
				</div>
				<div class="col-sm-3 aside" id="col-de2">
					<div class="widget">
						<h4 class="widget-title">Sản phẩm bán chạy</h4>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($all_sanpham as $all)
								@foreach($best_seller as $id_product)
								@if($all->id == $id_product)
								
								<div class="media beta-sales-item">
									<a class="pull-left" href="{{route('chitietsanpham',$all->id)}}"><img src="source/image/product/{{$all->image}}" alt=""></a>
									<div class="media-body">
										{{$all->name}}
										<span class="beta-sales-price">
												@if($all->promotion_price==0)
												<span class="flash-sale">{{number_format($all->unit_price)}} .đ</span>
												@else
												<span class="flash-del">{{number_format($all->unit_price)}} .đ</span>
												<span class="flash-sale">{{number_format($all->promotion_price)}} .đ</span>
												@endif
										</span>
									</div>
								</div>
								@endif
								@endforeach
								@endforeach
							</div>
						</div>
					</div> <!-- best sellers widget -->
					<div class="widget">
						<h4 class="widget-title">Sản phẩm mới</h4>
						<div class="widget-body">
							<div class="beta-sales beta-lists">
								@foreach($new_product as $new)
								<div class="media beta-sales-item">
									<a class="pull-left" href="product.html"><img src="source/image/product/{{$new->image}}" alt=""></a>
									<div class="media-body">
										{{$new->name}}
										<span class="beta-sales-price">@if($new->promotion_price==0)
												<span class="flash-sale">{{number_format($new->unit_price)}} .đ</span>
												@else
												<span class="flash-del">{{number_format($new->unit_price)}} .đ</span>
												<span class="flash-sale">{{number_format($new->promotion_price)}} .đ</span>
												@endif
										</span>
									</div>
								</div>
								@endforeach
								</div>
							</div>
						</div>
					</div> <!-- best sellers widget -->
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection('content');

