<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bài viết [Thêm bài viết]</title>
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
	<div class="row-title">Thêm bài viết</div>
	<div class="section-add">
		<form action="{{route('thembaiviet')}}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="control-group">
				<div class="control-label">
					<span class="required">Tiêu đề</span>
				</div>
				<div class="controls">
					<input type="text" name="title" value="" >
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">*Thể loại</span>
				</div>
				<div class="controls">
					<select name="type">
						<option value="" selected="selected" style="color: #3071bc">Chọn thể loại</option>
						
						@foreach($news_cat as $cat)
						<option value="{{$cat->id}}" style="color: #3071bc">{{$cat->name}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="control-group">
				<div class="control-label">
					<span class="required">Hình đại diện</span>
				</div>
				<div class="controls">
					<span><input type="file" name="image"></span>
				</div>
			</div>
			<div class="control-group" style="width: 80%">
					<span class="required">Nội dung</span>
					<textarea name="content" id="content" rows="10" cols="150"></textarea>
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
				<a href="{{route('tintuc')}}"><input type="button" name="" value="Thoát" ></a>
			</div>
			
		</form>
		
	</div>
	
</div>

<script>
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'content' );
</script>

</body>
</html>