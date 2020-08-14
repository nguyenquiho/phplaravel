	@extends('master')
	@section('content')

<div class="container">
			<div class="pull-left">
			</div>
			<div class="pull-right">
				<div class="beta-breadcrumb font-large">
					<a href="index.html">Trang chủ</a> / <span>Liên hệ</span>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content" class="space-top-none">
			
			<div class="space50">&nbsp;</div>
			<div class="row">
				<div class="col-sm-8">
					<h2>Liên hệ</h2>
					<div class="space20">&nbsp;</div>
					<p>Để liên hệ với chúng tôi, bạn cần điền các thông tin cá nhân và nội dung cần liên hệ. Chúng tôi sẽ phản hồi qua email của bạn một cách sớm nhất</p>
					<div class="space20">&nbsp;</div>
					<form action="#" method="post" class="contact-form">	
						<div class="form-block">
							<input name="your-name" type="text" placeholder="Họ và tên">
						</div>
						<div class="form-block">
							<input name="email" type="email" placeholder="Email">
						</div>
						<div class="form-block">
							<input name="phone" type="text" placeholder="Số điện thoại">
						</div>
						
						<div class="form-block">
							<textarea name="your-message" placeholder="Nội dung"></textarea>
						</div>
						<div class="form-block">
							<button type="submit" class="beta-btn primary">Gởi <i class="fa fa-chevron-right"></i></button>
						</div>
					</form>
				</div>
				<div class="col-sm-4">
					<h2>TECHFAST</h2><br>
					<div class="space20">&nbsp;</div>

					<h6 class="contact-title">Địa chỉ</h6>
					<p>
						01- Võ Oanh, P.5, Quận Bình Thạnh, Tp.HCM</br>
						Hotline: 0965106196<br>
						Facebook.com/techfast<br>
					</p>
					<div class="space20">&nbsp;</div>
					<div class="space20">&nbsp;</div>
				</div>
			</div>
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection('content');