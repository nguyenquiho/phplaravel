<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chi tiết đơn hàng</title>
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
	
<div>
	<table class="in-admin" id="tab-in-billDe">
		<tr class="title-tr">
			<th>STT</th>
			<th>Tên sản phẩm</th>
			<th>Hình</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Thành tiền</th>
		</tr>
		<?php 
			$i=1;
		?>
		@foreach($bill_detail as $billDe)
		<tr class="<?php if($i%2 ==0) echo"even-number"; else echo"odd-number" ?>">
			<td><?php echo $i++; ?></td>
			@foreach($product as $sp)
			@if(($sp->id) == ($billDe->id_product))
			<td>	
				{{$sp->name}}
			</td>
			<td><img src="source/image/product/{{$sp->image}}" style="width: 80px;height: 80px"></td>
			<td>{{number_format($billDe->unit_price)}} .đồng</td>
			<td>{{$billDe->quantity}}</td>
			<td>{{number_format($billDe->unit_price * $billDe->quantity)}} .đồng</td>
			@endif
			@endforeach
		</tr>	
		@endforeach
		<tr>
			<td>Tổng cộng:</td>
			<td colspan="5">
				@foreach($bill as $this_bill)
					@if(($this_bill->id) == $id)
					{{number_format($this_bill->total)}} đồng
					@endif
				@endforeach
			</td>
		</tr>
	</table>
	
	<div class="info-bill">
		@foreach($bill as $this_bill)
			@if(($this_bill->id) == $id)
		<span class="tit-info-bill">Mã đơn hàng</span><span>
			{{$this_bill->bill_code}}

		</span><br>
		<span class="tit-info-bill">Ngày tạo</span><span>{{$this_bill->created_at}}</span><br>
		<span class="tit-info-bill">Ngày sửa</span><span>{{$this_bill->updated_at}}</span><br>
		<span class="tit-info-bill">Phương thức thanh toán</span><span>
			@if(($this_bill->payment) == "COD") Thanh toán khi nhận hàng @else Chuyển khoản
			@endif
		</span><br>
		<span class="tit-info-bill">Phương thức vận chuyển</span><span>TechFast vận chuyển</span><br>
		<span class="tit-info-bill">Trạng thái</span>
			<form method="post" action="{{route('capnhatdonhang',$this_bill->id)}}">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
			@if($this_bill->status==0)
			
				
			<select name="status">
				<option value="0">Đang xử lí</option>
				<option value="1">Đang giao</option>
				<option value="2">Đã giao</option>
			</select></span><br>
			<input type="submit" name="update_status" value="Lưu">
				@elseif($this_bill->status==1)
			<select name="status">
				<option value="0" disabled="disable">Đang xử lí</option>
				<option value="1">Đang giao</option>
				<option value="2">Đã giao</option> 
			</select></span><br>
			<input type="submit" name="update_status" value="Lưu" class="group-btn-nav">
			@elseif($this_bill->status==2)
				<span style="color: green;font-family: roboto">Đã giao</span>
			</form>
			@if(Session::has('thongbao'))
			<div class="alert alert-success">{{Session::get('thongbao')}}</div>
			@endif
			@endif
			@endif
		@endforeach
			<input type="button" name="" value="Tải hoá đơn" class="group-btn-nav">
			<a href="{{route('donhang')}}"><input type="button" name="" value="Thoát" class="group-btn-nav"></a>
	</div>
	
	
</div>
</body>
</html>