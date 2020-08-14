
	<script>
	function ConfirmDelete() {
  		return confirm("Bạn chắc chắn muốn xoá?");
	}
	</script>
	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="{{route('trang-chu')}}">Home</a> / <a href="" style="color: tomato" title="">Người dùng</a>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="space-top-none">
			<div class="main-content" style="border-bottom: none;">
				<div class="space60">&nbsp;</div>
				<div class="row" id="info_user_page">
					<div class="col-sm-12" id="col-listsp" style="padding: 20px">
						<div class="beta-products-list">

							<div class="row">
							
				
							</div>
						</div> <!-- .beta-products-list -->
							<h4>
									TRANG CÁ NHÂN
							</h4>
							<div class="beta-products-details">
								<div class="clearfix"></div>
							</div>
							<div class="row">
								<div class="col-sm-3" >
									<div style="padding: 20px">
										<ul>
										<li style="text-transform: uppercase;font-weight: bold;color: #ff9900">Tài khoản của tôi</li>
										<li>Thông tin tài khoản</li>
										<li><a href="">Quản lí đơn hàng</a></li>
									</ul>
									</div>
									
								</div>
								<div class="col-sm-9" id="col-home">
									<div class="section-info-user">
										@if(Auth::check())
									<h4>LỊCH SỬ ĐƠN HÀNG</span></h4>
									<div style="width: 30%;float: right;margin-top:-37px;margin-right: 10px;">
										<form action="{{route('lochoadon')}}" method="get">
											<select name="status">
												<option value="0">Đang chờ</option>
												<option value="1">Đang giao</option>
												<option value="2">Đã nhận</option>
											</select>
											<input type="submit" value="Lọc">
										</form>	
									</div>
									<div>
 
										@foreach($bill as $bi)
													@foreach($customer as $cu)
													@if($bi->id_customer == $cu->id)
													<table style="width: 100%; text-align: center;border: 1px solid #f1f1f1">
														<tr style="border-bottom: 1px solid #f1f1f1;">
														<th colspan="3" style="padding: 10px">
															<span class="sp-bill-code" style="color: gray;font-weight: 500">Mã đơn hàng: {{$bi->bill_code}}</span><span style="float: right;">Trạng thái: @if($bi->status ==0) <span style="color: tomato">Đang chờ </span>@elseif($bi->status ==1)<span style="color: orange">Đang giao</span>@elseif($bi->status ==2)<span style="color: green">Đã giao </span>@endif</span>
															<span>
															</span>
														</th>
														</tr>
														<tr>
											
														@foreach($billde as $billd)
															@if($billd->id_bill == $bi->id)
																@foreach($product as $pro)
																	@if($pro->id == $billd->id_product)
																	<tr>
																	<td style=" text-align: center;padding: 5px"><img src="source/image/product/{{$pro->image}}" width="100" height="100" alt=""></td>
																	<td style=" text-align: left;vertical-align: middle;font-weight: 500"><p>{{$pro->name}}
																	</p>
																	<div class="space10">&nbsp;</div>
																	<p>x{{$billd->quantity}}
																	</p></td>
																	<td style="vertical-align: middle;">@if($pro->promotion_price==0)
																		<span class="flash-sale" style=" text-align: left;">						{{number_format($pro->unit_price)}} .đ</span>
																		@else
																		<span class="flash-sale" style=" text-align: left;vertical-align: middle;">						{{number_format($pro->promotion_price)}} .đ</span>
																		@endif</td>
																	</tr>
																	@endif
																@endforeach
															@endif
														@endforeach
														<tr>
															<td colspan="3" style="padding-left: 20px;color: red">Tổng tiền: {{number_format($bi->total)}}.đ</td>
														</tr>
														@if($bi->status==0)
															<tr>
																<td style="padding-left: 20px;color: red">Tổng tiền: {{number_format($bi->total)}}.đ</td>
																<td colspan="2" style="padding: 20px;text-align: right;"><a href="{{route('huydonhang',$bi->id)}}"><button onclick="return Confirm Delete()" style="border: red 1px solid;color: red;width: 100px;" type="">Huỷ đơn hàng</button></a></td>
															</tr>
														@endif
													</table>
													@endif
														
													@endforeach
										@endforeach

									</div>
									@endif
									</div>
									
								</div>
							</div>
							<div class="space40">&nbsp;</div>
							
						</div> <!-- .beta-products-list -->
					</div>
				</div> <!-- end section with sidebar and main content -->
	
			</div> <!-- .main-content -->
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection