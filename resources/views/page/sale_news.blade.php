	@extends('master')
	@section('content')
	<div class="inner-header">
		<div class="container">
			<div class="pull-right">
				<div class="beta-breadcrumb font-large" >
					<a href="index.html">Trang chủ</a> / <span style="color: tomato">Tin khuyến mãi</span>
				</div> 
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="container">
		<div id="content">
				<div class="col-sm-12" id="col-news">
					<h4>Tin khuyến mãi</h4>
				</div>
					<div>
						@foreach($tinkm as $news)
						<div class="one-news">
							<div class="col-sm-3">
								<div>
									<img src="source/image/news/{{$news->image}}" width="250" height="150">
								</div>
							</div>
							<div class="col-sm-9">
								<div class="content-short-news">
								<div class="tit-one-news"><a href="">{{$news->title}}</a></div>
								<div class="time-created">{{$news->created_at->diffForHumans()}}</div>
								<div class="main-short-content">
									<p class="ArticleBody">
										<?php echo substr(strip_tags($news['content']),0,500) . "..."; ?>
										<a href="" style="color: tomato"><p><b>Xem tiếp...</b></p></a>
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
