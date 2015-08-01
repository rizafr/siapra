<div class="clearfix">
	<div class="row">
		<div class="col-lg-12">
			
			<div class="navbar navbar-inverse wow fadeInDown ">
				<div class="container">
					<div class="navbar-header">
						<a class="navbar-brand" href="#">Beranda</a>
					</div>
					<div class="navbar-collapse collapse navbar-inverse-collapse" style="margin-right: -20px">
						
					</div><!-- /.nav-collapse -->
				</div><!-- /.container -->
			</div><!-- /.navbar -->
			
		</div>
	</div>
	<section id="main-content wow fadeInDown">
		<section class="wrapper">
			<div class="col-lg-6">
				<!--widget start-->
				<section class="panel wow slideInLeft" data-wow-duration="2s">
					<div class="twt-feed blue-bg">
						<h2>Selamat datang</h2>
						<h1><?php echo $this->session->userdata('admin_nama'); ?></h1>
						<p>Level : <?php echo $this->session->userdata('admin_level');?></p>
						<a href="#">
							<img src="<?php echo base_url(); ?>aset/img/profile-avatar.jpg" alt="">
						</a>
					</div>
					<div class="weather-category twt-category">
						<ul>
							<li class="active">
								<h5>320</h5>
								Tweet
							</li>
							<li>
								<h5>1245</h5>
								Following
							</li>
							<li>
								<h5>24657</h5>
								Followers
							</li>
						</ul>
					</div>					
				</section>
				<!--widget end-->
			</div>
			
			<!--state overview start-->
			<div class="row state-overview wow slideInRight" data-wow-duration="2s">
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol terques">
							<i class=" icon-envelope"></i>
						</div>
						<div class="value">
							<h1 class="count">
								0
							</h1>
							<p>Surat Masuk</p>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol red">
							<i class=" icon-envelope"></i>
						</div>
						<div class="value">
							<h1 class=" count2">
								0
							</h1>
							<p>Surat Keluar</p>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol yellow">
							<i class="icon-bell-alt"></i>
						</div>
						<div class="value">
							<h1 class=" count3">
								0
							</h1>
							<p>Proses Perkara</p>
						</div>
					</section>
				</div>
				<div class="col-lg-3 col-sm-6">
					<section class="panel">
						<div class="symbol blue">
							<i class="icon-bell-alt"></i>
						</div>
						<div class="value">
							<h1 class=" count4">
								0
							</h1>
							<p>Proses Penahanan</p>
						</div>
					</section>
				</div>
			</div>
			<!--state overview end-->
			
			<div class="row">
				<div class="col-lg-8">
					<!--Grafik Rekapitulasi-->
					<div id="grafik" class="wow slideInLeft" data-wow-duration="2s" ></div>
				</div>
				<div class="col-lg-4">
					<!--new earning start-->
					<div class="panel terques-chart wow slideInRight" data-wow-duration="2s">
						<div class="panel-body chart-texture">
							<div class="chart">
								<div class="heading">
									<span>Friday</span>
									<strong>$ 57,00 | 15%</strong>
								</div>
								<div class="sparkline" data-type="line" data-resize="true" data-height="75" data-width="90%" data-line-width="1" data-line-color="#fff" data-spot-color="#fff" data-fill-color="" data-highlight-line-color="#fff" data-spot-radius="4" data-data="[200,135,667,333,526,996,564,123,890,564,455]"></div>
							</div>
						</div>
						<div class="chart-tittle">
							<span class="title">New Earning</span>
							<span class="value">
								<a href="#" class="active">Market</a>
								|
								<a href="#">Referal</a>
								|
								<a href="#">Online</a>
							</span>
						</div>
					</div>
					<!--new earning end-->
					
					<!--total earning start-->
					<div class="panel green-chart wow slideInRight" data-wow-duration="2s">
						<div class="panel-body">
							<div class="chart">
								<div class="heading">
									<span>June</span>
									<strong>23 Days | 65%</strong>
								</div>
								<div id="barchart"></div>
							</div>
						</div>
						<div class="chart-tittle">
							<span class="title">Total Earning</span>
							<span class="value">$, 76,54,678</span>
						</div>
					</div>
					<!--total earning end-->
				</div>
			</div>
			<br />
			<br />
			<br />
			<div class="row">
				<div class="col-lg-4">
					<!--user info table start-->
					<section class="panel">
						<div class="panel-body">
							<a href="#" class="task-thumb">
								<img src="<?php echo base_url(); ?>aset/img/avatar1.jpg" alt="">
							</a>
							<div class="task-thumb-details">
								<h1><a href="#">Anjelina Joli</a></h1>
								<p>Senior Architect</p>
							</div>
						</div>
						<table class="table table-hover personal-task">
							<tbody>
                                <tr>
                                    <td>
                                        <i class=" icon-tasks"></i>
									</td>
                                    <td>New Task Issued</td>
                                    <td> 02</td>
								</tr>
                                <tr>
                                    <td>
                                        <i class="icon-warning-sign"></i>
									</td>
                                    <td>Task Pending</td>
                                    <td> 14</td>
								</tr>
                                <tr>
                                    <td>
                                        <i class="icon-envelope"></i>
									</td>
                                    <td>Inbox</td>
                                    <td> 45</td>
								</tr>
                                <tr>
                                    <td>
                                        <i class=" icon-bell-alt"></i>
									</td>
                                    <td>New Notification</td>
                                    <td> 09</td>
								</tr>
							</tbody>
						</table>
					</section>
					<!--user info table end-->
				</div>
				<div class="col-lg-8">
					<!--work progress start-->
					<section class="panel">
						<div class="panel-body progress-panel">
							<div class="task-progress">
								<h1>Work Progress</h1>
								<p>Anjelina Joli</p>
							</div>
							<div class="task-option">
								<select class="styled">
									<option>Anjelina Joli</option>
									<option>Tom Crouse</option>
									<option>Jhon Due</option>
								</select>
							</div>
						</div>
						<table class="table table-hover personal-task">
							<tbody>
								<tr>
									<td>1</td>
									<td>
										Target Sell
									</td>
									<td>
										<span class="badge bg-important">75%</span>
									</td>
									<td>
										<div id="work-progress1"></div>
									</td>
								</tr>
								<tr>
									<td>2</td>
									<td>
										Product Delivery
									</td>
									<td>
										<span class="badge bg-success">43%</span>
									</td>
									<td>
										<div id="work-progress2"></div>
									</td>
								</tr>
								<tr>
									<td>3</td>
									<td>
										Payment Collection
									</td>
									<td>
										<span class="badge bg-info">67%</span>
									</td>
									<td>
										<div id="work-progress3"></div>
									</td>
								</tr>
								<tr>
									<td>4</td>
									<td>
										Work Progress
									</td>
									<td>
										<span class="badge bg-warning">30%</span>
									</td>
									<td>
										<div id="work-progress4"></div>
									</td>
								</tr>
								<tr>
									<td>5</td>
									<td>
										Delivery Pending
									</td>
									<td>
										<span class="badge bg-primary">15%</span>
									</td>
									<td>
										<div id="work-progress5"></div>
									</td>
								</tr>
							</tbody>
						</table>
					</section>
					<!--work progress end-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<!--timeline start-->
					<section class="panel">
						<div class="panel-body">
							<div class="text-center mbot30">
								<h3 class="timeline-title">Timeline</h3>
								<p class="t-info">This is a project timeline</p>
							</div>
							
							<div class="timeline">
								<article class="timeline-item">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow"></span>
												<span class="timeline-icon red"></span>
												<span class="timeline-date">08:25 am</span>
												<h1 class="red">12 July | Sunday</h1>
												<p>Lorem ipsum dolor sit amet consiquest dio</p>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item alt">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow-alt"></span>
												<span class="timeline-icon green"></span>
												<span class="timeline-date">10:00 am</span>
												<h1 class="green">10 July | Wednesday</h1>
												<p><a href="#">Jonathan Smith</a> added new milestone <span><a href="#" class="green">ERP</a></span></p>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow"></span>
												<span class="timeline-icon blue"></span>
												<span class="timeline-date">11:35 am</span>
												<h1 class="blue">05 July | Monday</h1>
												<p><a href="#">Anjelina Joli</a> added new album <span><a href="#" class="blue">PARTY TIME</a></span></p>
												<div class="album">
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-1.jpg">
													</a>
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-2.jpg">
													</a>
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-3.jpg">
													</a>
													<a href="#">
														<img src="<?php echo base_url(); ?>aset/img/sm-img-1.jpg">
													</a>
													<a href="#">
														<img alt="" src="<?php echo base_url(); ?>aset/img/sm-img-2.jpg">
													</a>
												</div>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item alt">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow-alt"></span>
												<span class="timeline-icon purple"></span>
												<span class="timeline-date">3:20 pm</span>
												<h1 class="purple">29 June | Saturday</h1>
												<p>Lorem ipsum dolor sit amet consiquest dio</p>
												<div class="notification">
													<i class=" icon-exclamation-sign"></i> New task added for <a href="#">Denial Collins</a>
												</div>
											</div>
										</div>
									</div>
								</article>
								<article class="timeline-item">
									<div class="timeline-desk">
										<div class="panel">
											<div class="panel-body">
												<span class="arrow"></span>
												<span class="timeline-icon light-green"></span>
												<span class="timeline-date">07:49 pm</span>
												<h1 class="light-green">10 June | Friday</h1>
												<p><a href="#">Jonatha Smith</a> added new milestone <span><a href="#" class="light-green">prank</a></span> Lorem ipsum dolor sit amet consiquest dio</p>
											</div>
										</div>
									</div>
								</article>
							</div>
							
							<div class="clearfix">&nbsp;</div>
						</div>
					</section>
					<!--timeline end-->
				</div>
				<div class="col-lg-4">
					<!--revenue start-->
					<section class="panel">
						<div class="revenue-head">
							<span>
								<i class="icon-bar-chart"></i>
							</span>
							<h3>Revenue</h3>
							<span class="rev-combo pull-right">
								June 2013
							</span>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-6 col-sm-6 text-center">
									<div class="easy-pie-chart">
										<div class="percentage" data-percent="35"><span>35</span>%</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-6">
									<div class="chart-info chart-position">
										<span class="increase"></span>
										<span>Revenue Increase</span>
									</div>
									<div class="chart-info">
										<span class="decrease"></span>
										<span>Revenue Decrease</span>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-footer revenue-foot">
							<ul>
								<li class="first active">
									<a href="javascript:;">
										<i class="icon-bullseye"></i>
										Graphical
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class=" icon-th-large"></i>
										Tabular
									</a>
								</li>
								<li class="last">
									<a href="javascript:;">
										<i class=" icon-align-justify"></i>
										Listing
									</a>
								</li>
							</ul>
						</div>
					</section>
					<!--revenue end-->
					<!--features carousel start-->
					<section class="panel">
						<div class="flat-carousal">
							<div id="owl-demo" class="owl-carousel owl-theme">
								<div class="item">
									<h1>Flatlab is new model of admin dashboard for happy use</h1>
									<div class="text-center">
										<a href="javascript:;" class="view-all">View All</a>
									</div>
								</div>
								<div class="item">
									<h1>Fully responsive and build with Bootstrap 3.0</h1>
									<div class="text-center">
										<a href="javascript:;" class="view-all">View All</a>
									</div>
								</div>
								<div class="item">
									<h1>Responsive Frontend is free if you get this.</h1>
									<div class="text-center">
										<a href="javascript:;" class="view-all">View All</a>
									</div>
								</div>
							</div>
						</div>
						<div class="panel-body">
							<ul class="ft-link">
								<li class="active">
									<a href="javascript:;">
										<i class="icon-reorder"></i>
										Sales
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class=" icon-calendar-empty"></i>
										promo
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class=" icon-camera"></i>
										photo
									</a>
								</li>
								<li>
									<a href="javascript:;">
										<i class=" icon-circle"></i>
										other
									</a>
								</li>
							</ul>
						</div>
					</section>
					<!--features carousel end-->
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8">
					<!--latest product info start-->
					<section class="panel post-wrap pro-box">
						<aside>
							<div class="post-info">
								<span class="arrow-pro right"></span>
								<div class="panel-body">
									<h1><strong>popular</strong> <br> Brand of this week</h1>
									<div class="desk yellow">
										<h3>Dimond Ring</h3>
										<p>Lorem ipsum dolor set amet lorem ipsum dolor set amet ipsum dolor set amet</p>
									</div>
									<div class="post-btn">
										<a href="javascript:;">
											<i class="icon-chevron-sign-left"></i>
										</a>
										<a href="javascript:;">
											<i class="icon-chevron-sign-right"></i>
										</a>
									</div>
								</div>
							</div>
						</aside>
						<aside class="post-highlight yellow v-align">
							<div class="panel-body text-center">
								<div class="pro-thumb">
									<img src="<?php echo base_url(); ?>aset/img/ring.jpg" alt="">
								</div>
							</div>
						</aside>
					</section>
					<!--latest product info end-->
					<!--twitter feedback start-->
					<section class="panel post-wrap pro-box">
						<aside class="post-highlight terques v-align">
							<div class="panel-body">
								<h2>Flatlab is new model of admin dashboard <a href="javascript:;"> http://demo.com/</a> 4 days ago  by jonathan smith</h2>
							</div>
						</aside>
						<aside>
							<div class="post-info">
								<span class="arrow-pro left"></span>
								<div class="panel-body">
									<div class="text-center twite">
										<h1>Twitter Feed</h1>
									</div>
									
									<footer class="social-footer">
										<ul>
											<li>
												<a href="#">
                                                    <i class="icon-facebook"></i>
												</a>
											</li>
											<li class="active">
												<a href="#">
													<i class="icon-twitter"></i>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon-google-plus"></i>
												</a>
											</li>
											<li>
												<a href="#">
													<i class="icon-pinterest"></i>
												</a>
											</li>
										</ul>
									</footer>
								</div>
							</div>
						</aside>
					</section>
					<!--twitter feedback end-->
				</div>
				<div class="col-lg-4">
					<div class="row">
						<div class="col-xs-6">
							<!--pie chart start-->
							<section class="panel">
								<div class="panel-body">
									<div class="chart">
										<div id="pie-chart" ></div>
									</div>
								</div>
								<footer class="pie-foot">
									Free: 260GB
								</footer>
							</section>
							<!--pie chart start-->
						</div>
						<div class="col-xs-6">
							<!--follower start-->
							<section class="panel">
								<div class="follower">
									<div class="panel-body">
										<h4>Jonathan Smith</h4>
										<div class="follow-ava">
											<img src="<?php echo base_url(); ?>aset/img/follower-avatar.jpg" alt="">
										</div>
									</div>
								</div>
								
								<footer class="follower-foot">
									<ul>
										<li>
											<h5>2789</h5>
											<p>Follower</p>
										</li>
										<li>
											<h5>270</h5>
											<p>Following</p>
										</li>
									</ul>
								</footer>
							</section>
							<!--follower end-->
						</div>
					</div>
					<!--weather statement start-->
					<section class="panel">
						<div class="weather-bg">
							<div class="panel-body">
								<div class="row">
									<div class="col-xs-6">
                                        <i class="icon-cloud"></i>
										California
									</div>
									<div class="col-xs-6">
										<div class="degree">
											24°
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<footer class="weather-category">
							<ul>
								<li class="active">
									<h5>humidity</h5>
									56%
								</li>
								<li>
									<h5>precip</h5>
									1.50 in
								</li>
								<li>
									<h5>winds</h5>
									10 mph
								</li>
							</ul>
						</footer>
						
					</section>
					<!--weather statement end-->
				</div>
			</div>
			
		</section>
	</section>
</div>
<script type="text/javascript">
	
	$(document).ready(function () {
		
		
		$(function () {
			$('#grafik').highcharts({
				title: {
					text: 'Grafik Rekapitulasi',
					x: -20 //center
				},
				subtitle: {
					text: 'Tahun 2015',
					x: -20
				},
				xAxis: {
					categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
					'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
				},
				yAxis: {
					title: {
						text: 'Jumlah'
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: ' data'
				},
				legend: {
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series: [{
					name: 'Surat Masuk',
					data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
					}, {
					name: 'Surat Keluar',
					data: [-0.2, 0.8, 5.7, 11.3, 17.0, 22.0, 24.8, 24.1, 20.1, 14.1, 8.6, 2.5]
					}, {
					name: 'Proses Perkara',
					data: [-0.9, 0.6, 3.5, 8.4, 13.5, 17.0, 18.6, 17.9, 14.3, 9.0, 3.9, 1.0]
					}, {
					name: 'Proses Penahanan',
					data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
				}]
			});
		});
	});
</script>