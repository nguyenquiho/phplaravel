
	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <a href="{{route('danhmucsanpham',$danhmuc->id)}}" style="color: tomato" title="">{{$danhmuc->name}}</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content">
				<div class="space60">&nbsp;</div>
				<div class="row">
					<div class="col-sm-12" id="col-listsp">
						<div class="beta-products-list">

							<div class="row">
							
				
							</div>
						</div> <!-- .beta-products-list -->
							<h4>
									{{$danhmuc->name}}
							</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($loai_theodm as $loai)
								@if($loai->category_id == $danhmuc->id)
								@foreach($sanpham as $sp)
								@if($sp->id_type == $loai->id)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt=""></a>
										</div>
										<div class="single-item-body">
											<p class="single-item-title">{{$sp->name}}</p>
											<p class="single-item-price">
												<span>@if($sp->promotion_price==0)
												<span class="flash-sale">{{number_format($sp->unit_price)}} .đ</span>
												@else
												<span class="flash-del">{{number_format($sp->unit_price)}} .đ</span>
												<span class="flash-sale">{{number_format($sp->promotion_price)}} .đ</span>
												@endif</span>
											</p>
										</div>
										<div class="single-item-caption">
											<a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
											<a class="beta-btn primary" href="{{route('chitietsanpham',$sp->id)}}">Chi tiết <i class="fa fa-chevron-right"></i></a>
											<div class="clearfix"></div>
										</div>
									</div>
								</div>
								@endif
								@endforeach
								@endif
								@endforeach
							</div>
							<div class="row">{{$sanpham->links()}}</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
				@include('map')
	
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection