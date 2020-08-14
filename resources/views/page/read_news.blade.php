	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large" >
					<a href="index.html">Trang chủ</a> / <span style="color: tomato">Tin công nghệ</span>
				</div> 
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
				<div class="col-sm-12" id="col-readnews">
					<h3>{{$news->title}}</h3>
					<div class="space20">&nbsp</div>
				</div>
				<div>
					<?php echo $news->content ?>
				</div>
				<div class="space20">&nbsp</div>
				<div style="color: #006ba0">{{$news->created_at}}</div>
					<div class="space20">&nbsp</div>	
		</div> <!-- #content -->
	</div> <!-- .container -->
	@endsection('content');
