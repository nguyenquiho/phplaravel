	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="{{route('trang-chu')}}">Trang chủ</a> / <span>Đăng kí</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container" id="sup">
		<div id="content">
			
			<form action="{{route('dangki')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}} ">
				@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}
					@endforeach
				</div>
				@endif
				@if(Session::has('thanhcong'))
				<div class="alert alert-success">{{Session::get('thanhcong')}} </div>
				@endif
				<div class="row">
					<div class="col-sm-12">
						<div id="login-section" style="height: 600px;">
						<h4>Đăng kí</h4>
						<div class="space20">&nbsp;</div>

						
						<div class="form-block">
							<input type="email" id="email" name="email" placeholder="Email" required>
						</div>

						<div class="form-block">
							<input type="text" id="passw" name="name" placeholder="Họ và tên*" required>
						</div>

						<div class="form-block">
							<input type="text" id="passw" value="" name="address" placeholder="Địa chỉ" required>
						</div>


						<div class="form-block">
							<input type="text" id="passw" name="phone" placeholder="SĐT" required>
						</div>
						<div class="form-block">
							<input type="password" id="passw" name="pass" placeholder="Mật khẩu" required>
						</div>
						<div class="form-block">
							<input type="password" id="passw" name="repass" placeholder="Nhập lại mật khẩu" required>
						</div>
						<div class="form-block">
							<button type="submit" class="btn btn-primary">Đăng kí</button>
						</div>
					</div>
					</div>
					<div class="col-sm-3"></div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection('content');