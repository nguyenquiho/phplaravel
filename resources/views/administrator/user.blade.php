<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Người dùng</title>
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
  		return confirm("Bạn chắc chắn muốn xoá?");
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
	<div class="row-title">Người dùng</div>
	<div class="inp-search-in-admin">
		<button type="Text" class="add-product-btn"><a href="{{route('themsanpham')}}"><span class="glyphicon">&#x2b;</span>&nbsp;&nbsp;Thêm mới</a></button>
		<input type="text" name="" class="inp-search-pro" placeholder="Tìm kiếm"><button class="btn-s">Tìm</button>
		<form method="get" style="float: right;" action="">
			Sắp xếp theo:
			<select name="sortBy">
				<option value="1">ID</option>
				<option value="2">Tên</option>
			</select>
			
		</form>
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
	<table class="in-admin">
		<tr class="title-tr">
			<th>STT</th>
			<th>Tên người dùng</th>
			<th>Nhóm người dùng</th>
			<th>Email</th>
			<th>SĐT</th>
			<th>Địa chỉ</th>
			<th style="width: 15%">Ngày tạo</th>
			<th style="width: 15%">Ngày sửa</th>
			<th width="100">Thao tác</th>
			<th>ID</th>
		</tr>
		<?php $i = 1; ?>
		@foreach($admin as $ad)
		<tr style="padding-bottom: 30px" class="<?php if($i%2 ==0) echo"even-number"; else echo"odd-number" ?>">
			<td><?php echo $i++; ?></td>
			<td style="color: #3071a9;">{{$ad->full_name}}</td>
			<td style="color: #3071a9;">{{$ad->permision}}</td>
			<td></td>
			<td style="color: #3071a9;"></td>
			<td style="color: #3071a9;"></td>
			<td ></td>
			<td></td>
			<td></td>
			<td style="color: #3071a9;">{{$ad->id}}</td>
		</tr>
		@endforeach
		@foreach($users as $u)
		<tr style="padding-bottom: 30px" class="<?php if($i%2 ==0) echo"even-number"; else echo"odd-number" ?>">
			<td><?php echo $i++; ?></td>
			<td style="color: #3071a9;">{{$u->full_name}}</td>
			<td style="color: #3071a9;">Khách hàng</td>
			<td>{{$u->email}}</td>
			<td style="color: #3071a9;">{{$u->phone}}</td>
			<td style="color: #3071a9;">{{$u->address}}</td>
			<td >{{$u->created_at}}</td>
			<td>{{$u->updated_at}}</td>
			<td><a href=""><button type=""><span class="glyphicon" title="Sửa">&#xe019;</span></button></a>&nbsp;</td>
			<td><a href="">{{$u->id}}</a></td>
		</tr>
		@endforeach
	</table>
		<div class="row">
		</div>
	</div>
	
	
</div>
</body>
</html>