<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đơn hàng</title>
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
	<div class="inp-search-in-admin">
		<input type="text" name="" class="inp-search-pro"><button class="btn-s">Tìm</button>
	</div>
	<table class="in-admin">
		<tr class="title-tr">
			<th>ID</th>
			<th>STT</th>
			<th>Mã đơn hàng</th>
			<th>Trạng thái</th>
			<th>Khách hàng</th>
			<th>Địa chỉ</th>
			<th>Tổng tiền</th>
			<th>Hình thức thanh toán</th>
			<th>Ghi chú</th>
			<th>Ngày đặt hàng</th>
			<th>Ngày sửa</th>
		</tr>
		<?php 
  			$i = 1;
  		?>
		@foreach($bill as $this_bill)

		<tr class="<?php if($i%2 ==0) echo"even-number"; else echo"odd-number" ?>">
			<td>{{$this_bill->id}}</td>
			<td><?php echo $i++; ?></td>
			<td><a href="{{route('admin-chi-tiet-don-hang',$this_bill->id)}}">{{$this_bill->bill_code}}</a></td>
			<td>
				@if($this_bill->status==0) <span style="color: red;font-family: roboto;">Đang xử lí</span> @endif
				@if($this_bill->status==1) <span style="color: orange;font-family: roboto;">Đang giao @endif
				@if($this_bill->status==2) <span style="color: green;font-family: roboto;">Đã giao @endif
			</td>
			<td>
				@foreach($customer as $this_customer)
				@if(($this_bill->id_customer) == ($this_customer->id))<span style="color: #3071bc"> {{$this_customer->name}}</span> @endif
				@endforeach
			</td>
			<td style="color: grey;">
				@foreach($customer as $this_customer)
				@if(($this_bill->id_customer) == ($this_customer->id)) {{$this_customer->address}} @endif
				@endforeach
			</td>
			<td style="color: tomato;">{{number_format($this_bill->total)}}.đồng</td>
			<td style="color: #3071bc">
				@if(($this_bill->payment) == "COD") Thanh toán khi nhận hàng @else Chuyển khoản
			@endif
			</td>
			<td>{{$this_bill->note}}</td>
			<td>{{$this_bill->created_at}}</td>
			<td>{{$this_bill->updated_at}}</td>		
		</tr>	
		@endforeach
	</table>
	
	<div class="row">{{$bill->links()}}</div>
</div>
</body>
</html>