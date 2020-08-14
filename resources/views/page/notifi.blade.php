	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large" >
					<a href="index.html">Trang chủ</a> / <span style="color: tomato">Thông báo</span>
				</div> 
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
				<div class="col-sm-12" id="col-news">
					<h4>Thông báo</h4>
				</div>
					<div>
						@foreach($notifi as $no)
						<div class="one-news">
							<div class="col-sm-12">
								<div class="content-short-news">
								<div class="tit-one-news"><a href="">{{$no->title}}</a></div>
								<div class="main-short-content">
									<p class="ArticleBody">
										<?php echo $no->content;?>
    								</p>
								</div>
							</div>
							</div>
						
						</div>
						@endforeach
					</div>
					<div class="space20">&nbsp</div>	
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection('content');
