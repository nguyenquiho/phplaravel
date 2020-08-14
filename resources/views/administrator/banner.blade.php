<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bài viết</title>
</head>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
	<script>
	function ConfirmDelete() {
  		return confirm("Bạn chắn chắn muốn xoá?");
	}
	</script>
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
	<div class="row-title">Banner</div>
	<div class="inp-search-in-admin">
		<button type="Text" class="add-product-btn"><a href="{{route('thembaiviet')}}"><span class="glyphicon">&#x2b;</span>&nbsp;&nbsp;Banner</a></button>
		<input type="text" name="" class="inp-search-pro" placeholder="Tìm kiếm"><button class="btn-s">Tìm</button>
<!-- 				<form> 
					Hiển thị
					<select>
						<option value="10">10</option>
						<option value="25">25</option>
						<option value="50">50</option>
						<option value="">Tất cả</option>
					</select>

				</form> -->
	</div>
	<table class="in-admin" id="title-tr-news">
		<tr class="title-tr">
			<th>STT</th>
			<th>Tên </th>
			<th>Liên kết</th>
			<th>Hình ảnh</th>
			<th>Trạng thái</th>
			<th>Thao tác</th>
			<th>ID</th>
		</tr>
		<?php $i = 1; ?>
		@foreach($slide as $sl)
		<tr class="<?php if($i%2 ==0) echo"even-number"; else echo"odd-number" ?>">
			
			<td><?php echo $i++; ?></td>
			<td style="color:#3071a9; ">{{$sl->name}}</td>
			<td>{{$sl->link}}</td>
			<td style="padding: 10px"><img src="source/image/slide/{{$sl->image}}" width="100" height="50"></td>
			<td>
				@if($sl->status == 0) <span style="color: red">Không hiển thị</span>
				@else <span style="color: green">Hiển thị</span>
				@endif
			</td>
			<td><a href=""><button type=""><span class="glyphicon" title="Sửa">&#xe019;</span></button></a>&nbsp;&nbsp;<a href=""><button onclick="return ConfirmDelete();"><span class="glyphicon" title="Xoá" style="color: red">&#xe014;</span></button></a></td>
			<td style="color: #3071a9">{{$sl->id}}</td>
				
		</tr>
		@endforeach
	</table>
		<div class="row">{{$slide->links()}}</div>
	</div>
	
	
</div>
</body>
</html>