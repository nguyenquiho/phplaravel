<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sản phẩm</title>
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
	<div class="row-title">Sản phẩm</div>
	<div class="inp-search-in-admin">
				<button style="float: left;" type="Text" class="add-product-btn"><a href="{{route('themsanpham')}}"><span class="glyphicon">&#x2b;</span>&nbsp;&nbsp;Thêm mới</a></button>
		<form style="float: left;" method="get" role="search" action="{{route('timkiemsp')}}">
		<input type="text" name="search_pro" class="inp-search-pro" placeholder="Tìm kiếm"><button class="btn-s" type="submit">Tìm</button>
		</form>
		<form method="post" style="float: right;" action="{{route('sapxepsp')}}">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			Sắp xếp theo:
			<select name="by" style="height: 30px;">
				<option value="id">ID</option>
				<option value="name">Tên</option>
				<option value="price">Giá</option>
			</select>
			<button type="submit">Chọn</button>
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
			<th>Mã SP</th>
			<th>Tên SP</th>
			<th>Hình đại diện</th>
			<th>Danh mục</th>
			<th>Giá khuyến mãi</th>
			<th>Giá bán</th>
			<th>Số lượng</th>
			<th>SP mới</th>
			<th>SP khuyến mãi</th>
			<th>SP bán chạy</th>
			<th width="100">Thao tác</th>
			<th>ID</th>
		</tr>
		<?php $i = 1; ?>
		@foreach($product as $pro)
		<tr class="<?php if($i%2 ==0) echo"even-number"; else echo"odd-number" ?>">
			<td><?php echo $i++; ?></td>
			<td>{{$pro->product_code}}</td>
			<td><a href="{{route('suasanpham',$pro->id)}}" title="Sửa">{{$pro->name}}</a></td>
			<td><img src="source/image/product/{{$pro->image}}" style="width: 80px;height: 80px"></td>
			<td></td>
			<td>{{number_format($pro->promotion_price)}} .đồng</td>
			<td style="color: red;">{{number_format($pro->unit_price)}} .đồng</td>
			<td>{{$pro->amount}}</td>
			<td><input type="checkbox" name="" <?php if ($pro->new == 1): echo"checked = 'checked'"; endif ?> ></td>
			<td><input type="checkbox" name="" <?php if ($pro->promotion_price != 0): echo"checked = 'checked'"; endif ?>></td>
			<td><input type="checkbox" name=""></td>
			<td><a href="{{route('suasanpham',$pro->id)}}"><button type=""><span class="glyphicon" title="Sửa">&#xe019;</span></button></a>&nbsp;<a href="{{route('xoasanpham',$pro->id)}}"><button onclick="return ConfirmDelete()"><span class="glyphicon" title="Xoá" style="color: red">&#xe014;</span></button></a></td>
			<td><a href="{{route('suasanpham',$pro->id)}}" title="Sửa" style="font-weight: bold;">{{$pro->id}}</a></td>
		</tr>
		@endforeach
	</table>
		<div class="row">
			{{$product->links()}}
		</div>
	</div>
	
	
</div>
</body>
</html>