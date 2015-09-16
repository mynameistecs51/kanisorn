<?php $this->load->view('admin/header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> เพิ่มรายวิชาที่สอน </a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">เพิ่มรายวิชาที่สอน</div>
				<div class="panel-body ">
					<?php echo form_open('Welcome/insert_subjects',' class="form-horizontal" role="form" ');?>
					<div class="form-group col-sm-12">

						<label for="file_table" class="col-sm-2 control-label" >ชื่อวิชาที่สอน</label>
						<div class="col-sm-10 ">
							<input type="text" id="subj_name" class="form-control" name="subj_name" value=""  />
						</div>
					</div>
					<div class="form-group col-sm-12 ">
						<div class="pull-right">
							<button type="reset" class="btn btn-warning">RESET</button>
							<button type="submit" class="btn btn-success">SAVE</button>
						</div>
					</div>
					<?php echo form_close();?>
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">รายการ</div>
				<div class="panel-body">
					<div class="table-reponsive">
						<table class="table table-striped table-bordered table-hover">
							<thead >
								<tr>
									<th class="text-center col-md-1">ที่</th>
									<th class="text-center col-md-9">รายการ</th>
									<th class="text-center col-md-1">แก้ไข</th>
									<th class="text-center col-md-1">ลบ</th>
								</tr>
							</thead>
							<tbody>
								<?php $count_ = count($get_subj);?>
								<?php foreach ($get_subj as $row_subj):?>
									<tr class="text-center">
										<td><?php echo $count_--;?></td>
										<td class='text-left'><?php echo $row_subj->subj_name;?></td>
										<td><?php echo anchor('Welcome/delete_subj/'.$row_subj->subj_id,' ลบ');?></td>
										<td><?php echo anchor('#','แก้ไข','data-toggle="modal" data-target="#myModal'.$row_subj->subj_id.'"');?></td>
									</tr>
									<!-- Modal -->
									<div class="modal fade" id="myModal<?php echo $row_subj->subj_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Modal title</h4>
												</div>
												<div class="modal-body">
													<?php
													echo form_open('Welcome/update_subj','class="inline" role="form"');
													echo '<input type="hidden" name="subj_id" value="'.$row_subj->subj_id.'"';
													echo '<div class="form-group">';
													echo '<label for="subj_name">เพิ่มข้อมูการศึกษา</label>';
													
													echo '<textarea  class="form-control" id="subj_name" name="subj_name">',$row_subj->subj_name.'</textarea>';
													?>

												</div>
												<div class="modal-footer">
													<button type="close" class="btn btn-default" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Save changes</button>
												</div>
												<?php echo form_close();?>
											</div>
										</div>
									</div><!-- end modal -->
								<?php endforeach  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

</div> <!-- /.end show history -->

<?php $this->load->view('footer');?>