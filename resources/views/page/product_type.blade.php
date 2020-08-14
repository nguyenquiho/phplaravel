	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container" id="breadcrumb">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>
						@foreach($danhmuc as $dm)
						@if($dm->id==$loai->category_id)
						<a href="{{route('danhmucsanpham',$dm->id)}}">{{$dm->name}}</a> / <a href="{{route('loaisanpham',$loai->id)}}" style="color: tomato">{{$loai->name}}
						@endif
						@endforeach
					</span>
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
							  @foreach($danhmuc as $dm)
								@if($dm->id==$loai->category_id)
								{{$dm->name}} {{$loai->name}}
								@endif
							  @endforeach
							</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								@foreach($sp_theoloai as $sp)
								<div class="col-sm-3">
									<div class="single-item">
										<div class="single-item-header">
											<a href="{{route('chitietsanpham',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" style="width: 280px;height: 280px" alt=""></a>
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
								@endforeach
							</div>
							<div class="space40">&nbsp;</div>
							<div class="row">
								{{$sp_theoloai->links()}}
							</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->


			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection