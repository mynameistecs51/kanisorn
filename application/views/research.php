<?php $this->load->view('header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> แสดงงานวิจัย </a>
	</div>
	<hr/>
	<!-- show data reseacrh -->
	<div class="panel with-nav-tabs panel-default">
		<div class="panel-heading">
			<ul class="nav nav-tabs">
				<li class="active"><a href="#tab1national" data-toggle="tab">National</a></li>
				<li><a href="#tab2international" data-toggle="tab">Internation</a></li>
			</ul>
		</div>
		<div class="panel-body">
			<div class="tab-content">
				<div class="tab-pane fade in active" id="tab1national">
					<div class="panel panel-success">
						<div class="panel-heading">รายการ</div>
						<div class="panel-body">
							<div class="table-reponsive">
								<table class="table table-striped table-bordered table-hover">
									<thead >
										<tr>
											<th class="text-center col-md-1">ที่</th>
											<th class="text-center col-md-9">วิจัย/โครงงาน</th>
											<th class="text-center col-md-1">แก้ไข</th>
											<th class="text-center col-md-1">ลบ</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = count($this->db->where('res_type','national')->get('research'));?>
										<?php foreach ($this->db->where('res_type','national')->order_by('res_id','ASC')->get('research')->result() as $research): ?>

											<tr>
												<td><?php echo $no ++ ;?></td>
												<td>
													<?php echo "<b>".$research->res_name."</b><br/>". substr($research->res_detail,0,100);?>
												</td>
												<td>edit</td>
												<td>delete</td>
											</tr>
										<?php endforeach ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div> <!-- end show research national -->
				<div class="tab-pane fade" id="tab2international">
					<div class="panel panel-success">
						<div class="panel-heading">รายการ</div>
						<div class="panel-body">
							<div class="table-reponsive">
								<table class="table table-striped table-bordered table-hover">
									<thead >
										<tr>
											<th class="text-center col-md-1">ที่</th>
											<th class="text-center col-md-9">วิจัย/โครงงาน</th>
											<th class="text-center col-md-1">แก้ไข</th>
											<th class="text-center col-md-1">ลบ</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = count($this->db->where('res_type','international')->get('research'));?>
										<?php foreach ($this->db->where('res_type','international')->order_by('res_id','ASC')->get('research')->result() as $research): ?>

											<tr>
											<td><?php echo $no++;?></td>
												<td>
													<?php echo "<b>".$research->res_name."</b><br/>". substr($research->res_detail,0,100);?>
												</td>
												<td>edit</td>
												<td>delete</td>
											</tr>
										<?php endforeach ?>

									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div> <!-- end show research international -->
			</div>
		</div>
	</div>
	<hr>

</div> <!-- /.end show history -->

<?php $this->load->view('footer');?>