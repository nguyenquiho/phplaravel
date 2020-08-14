
	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <a href="" style="color: tomato" title="">Người dùng</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content" style="border-bottom: none;">
				<div class="space60">&nbsp;</div>
				<div class="row" id="info_user_page">
					<div class="col-sm-12" id="col-listsp" style="padding: 20px">
						<div class="beta-products-list">

							<div class="row">
							
				
							</div>
						</div> <!-- .beta-products-list -->
							<h4>
									TRANG CÁ NHÂN
							</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="col-sm-3" >
									<div style="padding: 20px">
										<ul>
										<li style="text-transform: uppercase;font-weight: bold;color: #ff9900">Tài khoản của tôi</li>
										<li>Thông tin tài khoản</li>
										<li><a href="{{route('quanlidonhang')}}">Quản lí đơn hàng</a></li>
									</ul>
									</div>
									
								</div>
								<div class="col-sm-9" id="col-home">
									<div class="section-info-user">
										@if(Auth::check())
									<h6>THÔNG TIN TÀI KHOẢN</h6>
									<label>Họ và tên</label><input type="text" value ="{{Auth::user()->full_name}}" name="">
									<label>Số điện thoại</label><input type="text" name="" value="{{Auth::user()->phone}}">
									<label>Email</label><input type="text" name="" value="{{Auth::user()->phone}}">
									@endif
									<div>
										<button>Lưu</button>
									</div>
									</div>
									
								</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
	
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection