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
	<link href="<?php echo base_url();?>css/bbootstrap-select.css" rel="stylesheet">

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
				<?php echo anchor('Welcome/index_page','ดร.คณิศร จี้กระโทก','class="navbar-brand inline" id="name_head" ');?>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="index_page">index page</a>
					</li>
					<li>
						<a href="#">Paper</a>
					</li>
					<li>
						<a href="#">Contact</a>
					</li>
					<li>
						<?php
						if(!$fb_data['me']){
							echo anchor($fb_data['loginUrl'],'<image src="'.base_url().'files_upload/fb_login.png"/>');
						}  else  {
							echo "<div>";
							echo anchor('https://www.facebook.com/profile.php?id='.$fb_data['me']['name'],' <img src="https://graph.facebook.com/'.$fb_data['uid'].'/picture" alt="" class="pic " />');
							echo "&nbsp;&nbsp;";
							//echo "<br/>";
							echo anchor('Welcome/logout','logout','class="pull-right navbar-brand inline "');
							echo "</div>";
						}
						?>
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
						<a href="index_page" class="thumbnail">
							<?php foreach ($this->db->get('picture_profile')->result() as $row_pic) {
								if(count($row_pic->picPro_name) < 1){

									echo '<img src="'.base_url().'picture/picProfile/no_picture.jpg" alt="รูปโปรไฟล์">';
								}

								echo '<img src="'.base_url().'picture/picProfile/'.$row_pic->picPro_name.'" alt="รูปโปรไฟล์">';

							}
							?>
						</a>
						<div id="name_head" class="col-md-12">ดร.คณิศร  จี้กระโทก</div>
					</div>
				</div>
				<!-- /.end showPicture -->

				<div class="list-group"> <!-- เมนู -->

					<?php
					$a = ($active == 'pictureProfile' ? 'active': '');
					echo anchor('Welcome/mngPiture_Profile','<i class="glyphicon glyphicon-user"> จัดารภาพโปรไฟล์</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'pictureSlide' ? 'active': '');
					echo anchor('Welcome/mngPicture_slide','<i class="glyphicon glyphicon-picture"> จัดการภาพสไลด้</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'history' ? 'active' : '');
					echo anchor('Welcome/management','<i class="fa fa-info-circle"> จัดการประวัติการศึกษา</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'document' ? 'active' : '');
					echo anchor('Welcome/mngDocument','<i class="fa fa-book"> จัดการเอกสารประกอบการสอน</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'research' ? 'active' : '');
					echo anchor('Welcome/mngResearch','<i class="fa fa-newspaper-o"> จัดการงานวิจัย</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'taecher' ? 'active':'');
					echo anchor('Welcome/mngTable','<i class="fa fa-newspaper-o"> จัดการตารางสอน</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'contact' ? 'active': '');
					echo anchor('Welcome/contact','<i class="fa fa-commenting"> จัดการติดต่อ</i>','class="list-group-item '.$a.'"');
					$a = ($active == 'subjects' ? 'active': '');
					echo anchor('Welcome/mngsubjects','<i class="fa fa-commenting"> เพิ่มรายวิชา</i>','class="list-group-item '.$a.'"');
					?>

				</div>  <!-- /.end menu -->

				<div class="col-md-12 well">
					<?php echo "จำนวนผู้เยี่ยมชม :";?>
				</div>
			</div>

			<div class="col-md-9">
