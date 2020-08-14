<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm [Thêm mới]</title>
</head>
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
	<script src="ckeditor/ckeditor.js"></script>
<body>
	<div class="navbar-admin">
		<ul class="menu-nav">
			<li class="dropdown"><a href="{{route('donhang')}}">Đơn hàng</a></li>
			<li class="dropdown"><a href="{{route('ql-danhmuc')}}">Danh mục</a></li>
			<li class="dropdown"><a href="{{route('sanpham')}}">Sản phẩm</a></li>
			<li class="dropdown"><a href="{{route('nguoidung')}}">Người dùng</a></li>
			<li class="dropdown"><a href="{{route('tintuc')}}">Tin tức</a></li>
			<li class="dropdown"><a href="{{route('banner')}}">Banner</a> </li>
			<li class="dropdown"><a href="{{route('thongbao')}}">Thông báo</a> </li>
		</ul>
		<span id="logout-admin">@if(Session::has('username'))<span class="admin-name">Chào {{Session('username')}}</span>@endif
<a href="{{route('admin-dangxuat')}}">Đăng xuất</a></span>
	</div>
	
<div class="section-conten-in-admin">
	<div class="row-title">Thêm sản phẩm</div>
	<div class="section-add">
		<form action="{{route('themsanpham')}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">

			<div class="control-group">
				<div class="control-label">
					<span class="required">*Tên SP</span>
				</div>
				<div class="controls">
					<input type="text" name="name">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">*Mã SP</span>
				</div>
				<div class="controls">
					<input type="text" name="product_code">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">*Danh mục chính</span>
				</div>
				<div class="controls">
					<select name="type">
						<option value="" selected="selected" style="color: #3071bc">Chọn danh mục</option>
						@foreach($danhmuc as $dm)
						<option value="{{$dm->id}}" disabled="disable" style="color: #3071bc">{{$dm->name}}</option>

						@foreach($loai as $l)
						@if($l->category_id == $dm->id)
						<option value="{{$l->id}}">&nbsp;&nbsp;&nbsp;&nbsp;{{$l->name}}</option>

						@endif
						@endforeach
						@endforeach
						
					</select>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">Hình đại diện</span>
				</div>
				<div class="controls">
					<input type="file" name="image">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">*Giá</span>
				</div>
				<div class="controls">
					<input type="number" name="unit_price" min="0">
				</div>
			</div>			
			<div class="control-group">
				<div class="control-label">
					<span class="required">Giá khuyến mãi</span>
				</div>
				<div class="controls">
					<input type="number" name="promotion_price" min="0">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">Số luợng</span>
				</div>
				<div class="controls">
					<input type="text" name="amount">
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">Mô tả ngắn</span>
					
				</div>
				<div class="controls">
					<textarea name="short_description" id="" rows="3" cols="40"></textarea>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">Mô tả chi tiết</span>
				</div>
				<div class="controls">
					<textarea name="full_description" id="noidung" rows="5" cols="40"></textarea>
				</div>
			</div>
			@if(Session::has('flag'))
				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
			@endif
			@if(count($errors)>0)
				<div class="alert alert-danger">
					@foreach($errors->all() as $err)
					{{$err}}
					@endforeach
				</div>
			@endif
			<div class="submit-group-nav-add-product">
				<input type="submit" name="" value="Lưu">
				<a href="{{route('sanpham')}}"><input type="button" name="" value="Thoát" onclick=""></a>
			</div>
			
		</form>
		
	</div>
	
</div>
</body>
</html>