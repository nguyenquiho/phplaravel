<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập - Techfast</title>
	<base href="{{asset('')}}">
	<link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="source/assets/dest/css/font-awesome.min.css">
	<link rel="stylesheet" href="source/assets/dest/vendors/colorbox/example3/colorbox.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="source/assets/dest/rs-plugin/css/responsive.css">
	<link rel="stylesheet" href="source/assets/dest/css/animate.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/huong-style.css">
	<link rel="stylesheet" title="style" href="source/assets/dest/css/custom2.css">
</head>
<body class="body-container-admin">
	<div class="container-admin">
		<div class="content-admin">

			<form action="{{route('admin-dangnhap')}}" method="post" class="form-login-admin" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="img-logo-admin">
					<img src="source/assets/dest/images/techfast-logoAdmin.png" width="240" alt="">
				</div>
				<div id="input-username">
					<!-- <i class="fa fa-user"></i> -->
					<input type="text" name="username" placeholder="Tên người dùng">
				</div>
				<div class="input-pass">
					<input type="password" name="pass" placeholder="Mật khẩu" >
				</div>
				<button type="submit" class="btn-submit-form-lg-admin">Đăng nhập</button>
				@if(Session::has('flag'))
				<span class="alert alert-{{Session::get('flag')}}" id="alert-danger-admin">{{Session::get('mess')}}</span>
				@endif
			</form>
		</div>	
			<div><span class="glyphicon glyphicon-new-window"><span id="ccc"> Trở về trang chủ</span></span><span class="span-footer">© 2020 Techfast</span></div>
	</div>

</body>
</html>