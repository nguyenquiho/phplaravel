	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng nhập</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container" id="sup">
		<div id="content">
			
			<form action="{{route('dangnhap')}}" method="post" class="">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				@if(Session::has('flag'))
				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
				@endif
				<div class="row">
					<div class="col-sm-12">
						<div id="login-section">
							<h4>Đăng nhập</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<input type="email" id="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-block">
							<input type="password" id="passw" name="pass" placeholder="Mật khẩu" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng nhập</button>
						</div>
						<span>Bạn chưa có tài khoản?</span><a href=""><b> Đăng kí</b></a>
						</div>
						
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection