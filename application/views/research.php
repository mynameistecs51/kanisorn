<?php $this->load->view('header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> แสดงงานวิจัย </a>
	</div>
	<hr/>
	<!-- show data research -->
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
										</tr>
									</thead>
									<tbody>
										<?php $no = count($this->db->where('res_type','national')->get('research'));?>
										<?php foreach ($this->db->where('res_type','national')->order_by('res_id','ASC')->get('research')->result() as $research): ?>

											<tr>
												<td><?php echo $no ++ ;?></td>
												<td>
													<?php echo anchor('#',"<b>".$research->res_name."</b><br/>". substr($research->res_detail,0,100),'data-toggle="modal" data-target="#myModal'.$research->res_id.'"');?>
													<!-- Modal  form upload -->
													<div class="modal fade" id="myModal<?php echo $research->res_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
														<div class="modal-dialog modal-lg" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title" id="myModalLabel">งานวิจัย</h4>
																</div>
																<div class="modal-body">
																	<div class="panel panel-success">
																		<div class="panel-heading">
																			<b><?php echo $research->res_name;?></b>
																		</div>
																		<div class="panel-body" style="display: block;word-wrap:break-word; ">
																			<p>
																				<?php
																				echo "<b>".$research->res_name."</b><br/><br/>";
																				echo $research->res_detail;
																				?>
																			</p>
																			<div class="text-center">
																				<object  width="800" height="800" data='<?php echo base_url();?>files_upload/file_research/<?php echo $research->res_file;?>' />
																				</object>
																			</div>
																			<br/>
																			<div class="row col-md-12 ">
																				<?php
																				$picName = explode(',',$research->res_pict);
																				for($i=0;$i< count($picName);$i++){
																					?>
																					<div class="col-xs-6 col-md-3">
																						<div class="thumbnail">
																							<img src="<?php echo base_url();?>files_upload/file_research/<?php echo $picName[$i];?>"/>
																						</div>
																					</div>
																					<?php } //endfor	?>
																				</div>

																			</div>	<!-- /.panel body -->
																		</div>	<!-- /.panel  -->
																	</div><!-- end modal -->
																</td>
															</tr>

														<?php endforeach; ?>

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
														</tr>
													</thead>
													<tbody>
														<?php $no = count($this->db->where('res_type','international')->get('research'));?>
														<?php foreach ($this->db->where('res_type','international')->order_by('res_id','ASC')->get('research')->result() as $research): ?>

															<tr>
																<td><?php echo $no ++ ;?></td>
																<td>
																	<?php echo anchor('#',"<b>".$research->res_name."</b><br/>". substr($research->res_detail,0,100),'data-toggle="modal" data-target="#myModal'.$research->res_id.'"');?>
																	<!-- Modal  form upload -->
																	<div class="modal fade" id="myModal<?php echo $research->res_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
																		<div class="modal-dialog modal-lg" role="document">
																			<div class="modal-content">
																				<div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h4 class="modal-title" id="myModalLabel">งานวิจัย</h4>
																				</div>
																				<div class="modal-body">
																					<div class="panel panel-success">
																						<div class="panel-heading">
																							<b><?php echo $research->res_name;?></b>
																						</div>
																						<div class="panel-body" style="display: block;word-wrap:break-word; ">
																							<p>
																								<?php
																								echo "<b>".$research->res_name."</b><br/><br/>";
																								echo $research->res_detail;
																								?>
																							</p>
																							<div class="text-center">
																								<object  width="800" height="800" data='<?php echo base_url();?>files_upload/file_research/<?php echo $research->res_file;?>' />
																								</object>
																							</div>
																							<br/>
																							<div class="row col-md-12 ">
																								<?php
																								$picName = explode(',',$research->res_pict);
																								for($i=0;$i< count($picName);$i++){
																									?>
																									<div class="col-xs-6 col-md-3">
																										<div class="thumbnail">
																											<img src="<?php echo base_url();?>files_upload/file_research/<?php echo $picName[$i];?>"/>
																										</div>
																									</div>
																									<?php } //endfor	?>
																								</div>

																							</div>	<!-- /.panel body -->
																						</div>	<!-- /.panel  -->
																					</div><!-- end modal -->
																				</td>
																			</tr>

																		<?php endforeach; ?>
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