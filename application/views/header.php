<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="kanisorn คณิศร ">
	<meta name="author" content="kanisorn คณิศร ">

	<title>Kanisorn Profile</title>

	<!-- Bootstrap Core CSS -->
	<link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom CSS -->
	<link href="<?php echo base_url();?>css/shop-item.css" rel="stylesheet">

	<!-- font-awesome-4.4.0 -->
	<link rel="stylesheet" href="<?php echo base_url();?>font-awesome-4.4.0/css/font-awesome.min.css">

	<style type="text/css">
		@font-face {
			font-family: myFirstFont;
			src: url('<?php echo base_url();?>/fonts/TH Charmonman Bold.ttf');
		}

		#name_head {
			font-family: myFirstFont;
			font-size: 18pt;
		}
	</style>

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-inverse navbar-fixed-top " role="navigation">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand inline" href="index" id="name_head">ดร.คณิศร จี้กระโทก</a> -->
				<?php echo anchor('Welcome/','ดร.คณิศร จี้กระโทก','class="navbar-brand inline" id="name_head" ');?>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="#">History</a>
					</li>
					<li>
						<a href="#">Paper</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<li class="">
						<?php
						if(!$fb_data['me']){
							echo anchor($fb_data['loginUrl'],'<image src="'.base_url().'files_upload/fb_login.png"/>');
						}  else  {
							echo anchor('https://www.facebook.com/profile.php?id='.$fb_data['me']['name'],' <img src="https://graph.facebook.com/'.$fb_data['uid'].'/picture" alt="" class="pic" />');
							//echo "&nbsp;&nbsp;";
							//echo "<br/>";
							echo anchor('Welcome/logout','logout','class="pull-right "');
						}
						?>
						<?php //echo anchor('Welcome/management','admin');?>
					</li>
				</ul>
			</div>
			<!-- /.navbar-collapse -->
		</div>
		<!-- /.container -->
	</nav>

	<!-- Page Content -->
	<div class="container">

		<div class="row">

			<div class="col-md-3">
				<!-- showPicture -->
				<div class="form-group row ">
					<div class="col-xs-12 text-center">
						<a href="index" class="thumbnail">
							<img src="<?php echo base_url();?>picture/picProfile/1.jpg" alt="รูปโปรไฟล์">
						</a>
						<div id="name_head" class="col-md-12">ดร.คณิศร  จี้กระโทก</div>
					</div>
				</div>
				<!-- /.end showPicture -->

				<div class="list-group"> <!-- เมนู -->

					<?php
					$a = ($active == 'history' ? 'active' : '');
					echo anchor('Welcome/index','<i class="fa fa-info-circle"> ประวัติการศึกษา</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'document' ? 'active' : '');
					echo anchor('Welcome/document','<i class="fa fa-book"> เอกสารการสอน</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'research' ? 'active' : '');
					echo anchor('Welcome/research','<i class="fa fa-newspaper-o"> งานวิจัย</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'table_taecher' ? 'active':'');
					echo anchor('Welcome/show_table','<i class="fa fa-newspaper-o"> ตารางสอน</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'contact' ? 'active': '');
					echo anchor('Welcome/contact','<i class="fa fa-commenting"> ติดต่อ</i>','class="list-group-item '.$a.'"');
					?>

				</div>  <!-- /.end menu -->

				<div class="col-md-12 well">
					<?php echo "จำนวนผู้เยี่ยมชม :";?>
				</div>
			</div>

			<div class="col-md-9">

				<div class="thumbnail"><!--  show picture slide/ -->
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
							<li data-target="#carousel-example-generic" data-slide-to="1"></li>
							<li data-target="#carousel-example-generic" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox">
							<div class="item active">
								<img class="img-responsive"  src="<?php echo base_url();?>picture/slides/1.jpg" alt="" style="height: 300px;"/>
								<div class="carousel-caption">
									...
								</div>
							</div>
							<div class="item" >
								<img class="img-responsive"  src="<?php echo base_url();?>picture/slides/2.jpg" alt="" style="height: 300px;"/>
								<div class="carousel-caption">
									...
								</div>
							</div>
							<div class="item">
								<img class="img-responsive"  src="<?php echo base_url();?>picture/slides/3.jpg" alt="" style="height: 300px;"/>
								<div class="carousel-caption">
									...
								</div>
							</div>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>  <!-- /.end show slide -->