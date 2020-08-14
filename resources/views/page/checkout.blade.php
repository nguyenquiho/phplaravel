	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb">
					<a href="index.html" style="color: tomato">Trang chủ</a> / <span style="color: tomato">Đặt hàng</span></p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
	<div class="container">
		<div id="content">
			
			<form action="{{route('dathang')}}" method="post" class="beta-form-checkout">
				<input type="hidden" name="_token" value="{{csrf_token()}} ">
				@if(Session::has('thongbao'))<div class="alert alert-success">{{Session::get('thongbao')}}</div> @endif
				@if(Session::has('flag'))
				<div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
				@endif
				<div class="row">
					<div class="col-sm-6" id="col-listsp">
						<h4>Đặt hàng</h4>
						<div class="space20">&nbsp;</div>

						<div class="form-block">
							<label for="name">Họ tên*</label>
							<input type="text" id="name" name="name" placeholder="Nhập vào họ tên" required>
						</div>
						<div class="form-block">
							<label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
										
						</div>

						<div class="form-block">
							<label for="email">Email*</label>
							<input type="email" name="email" id="email" required placeholder="Nhập vào địa chỉ email">
						</div>

						<div class="form-block">
							<label for="adress">Địa chỉ*</label>
							<input type="text" name="address" id="adress" placeholder="Nhập vào địa chỉ" required>
						</div>
						

						<div class="form-block">
							<label for="phone">Điện thoại*</label>
							<input type="text" id="phone" name="phone" required>
						</div>
						
						<div class="form-block">
							<label for="notes">Ghi chú</label>
							<textarea id="notes" name="notes"></textarea>
						</div>

						<div class="form-block">
							<label for="discount_code">Nhập mã giảm giá(Nếu có):</label>
							<input type="text" id="name" name="code">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="your-order">
							<div class="your-order-head"><h5>Đơn hàng của bạn</h5></div>
							<div class="your-order-body" style="padding: 0px 10px">
								<div class="your-order-item">
									<div>
									@if(Session::has('cart'))
									@foreach($product_cart as $product)
									<!--  one item	 -->
										<div class="media">
											<img width="25%" src="source/image/product/{{$product['item']['image']}}" alt="" class="pull-left">
											<div class="media-body">
												<p style="color: #006ba0" class="font-large">{{$product['item']['name']}}</p>
												<!-- <span class="color-gray your-order-info">Color: Red</span> -->
												<!-- <span class="color-gray your-order-info">Size: M</span> -->
												<div class="color-gray your-order-info" style="color: tomato">Đơn giá: @if($product['item']['promotion_price']==0)
											{{number_format($product['item']['unit_price'])}}
											@else {{number_format($product['item']['promotion_price'])}}
											@endif
											.đ
											<p>Số lượng: {{$product['qty']}}</p></div>
											</div>
										</div>
									<!-- end one item -->
									@endforeach
									
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="your-order-item">
									<div class="pull-left"><p class="your-order-f18">Tổng tiền:</p></div>
									<div class="pull-right"><h5 class="color-black" style="color: tomato">{{number_format(Session('cart')->totalPrice)}} đồng @else 0 đồng</h5></div>
									<div class="clearfix"></div>
								</div>
								@endif
							</div>
							<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
							
							<div class="your-order-body">
								<ul class="payment_methods methods">
									<li class="payment_method_bacs">
										<input id="payment_method_bacs" type="radio" class="input-radio" name="payment" value="COD" checked="checked" data-order_button_text="">
										<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										<div class="payment_box payment_method_bacs" style="display: block;">
											Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn xem hàng rồi thanh toán tiền cho nhân viên giao hàng
										</div>						
									</li>

									<li class="payment_method_cheque">
										<input id="payment_method_cheque" type="radio" class="input-radio" name="payment" value="ATM" data-order_button_text="">
										<label for="payment_method_cheque">Chuyển khoản </label>
										<div class="payment_box payment_method_cheque" style="display: none;">
											Chuyển tiền đến tài khoản sau:
											<br>- Số tài khoản: 123 456 789
											<br>- Chủ TK: Nguyễn A
											<br>- Ngân hàng ACB, Chi nhánh TPHCM
										</div>						
									</li>
									
								</ul>
							</div>

							<div class="text-center"><button type="submit"class="beta-btn primary" href="#" >Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
						</div> <!-- .your-order -->
					</div>
				</div>
			</form>
		</div> <!-- #content -->
	</div> <!-- .container -->
@endsection('content');
	
