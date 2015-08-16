<?php $this->load->view('admin/header');?>	
<style type="text/css">
	.form_error1 {
		color: red;
		position:absolute;
		display: inline;
	}
</style>

<div class="well"> <!-- show  history-->

	<div class="text-left">
		<a class="btn btn-success">จัดการประวัติ</a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">	<!-- form add history -->
				<div class="panel-heading">.:เพิ่มข้อมูการศึกษา:.</div>
				<div class="panel-body">
					<?php echo  form_open('Welcome/add_uniData','class="inline" role="form"');?>
					<div class="form-group">
						<label for="universityData">เพิ่มข้อมูการศึกษา</label>
						<?php echo form_error('universityData', '<div class="form_error1">', '</div>');?>
						<textarea  class="form-control" id="universityData" name="universityData"></textarea>
					</div>
					<div class="form-group pull-right">
						<button type="reset" class="btn btn-warning">RESET</button>
						<button type="submit" class="btn btn-success">SAVE</button>
					</div>
					<?php echo form_close();?>
				</div>
			</div>  <!-- /.end panel -->
			<hr/>
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
								<?php $count_ = count($get_university);?>
								<?php foreach ($get_university as $row_uni):?>
									<tr class="text-center">
										<td><?php echo $count_--;?></td>
										<td class='text-left'><?php echo $row_uni->uni_data;?></td>
										<td><?php echo anchor('Welcome/delete_uniID/'.$row_uni->uni_id,' ลบ');?></td>
										<td><?php echo anchor('#','แก้ไข','data-toggle="modal" data-target="#myModal'.$row_uni->uni_id.'"');?></td>
									</tr>
									<!-- Modal -->
									<div class="modal fade" id="myModal<?php echo $row_uni->uni_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Modal title</h4>
												</div>
												<div class="modal-body">
													<?php
													echo form_open('Welcome/update_uni','class="inline" role="form"');
													echo '<input type="hidden" name="uni_id" value="'.$row_uni->uni_id.'"';
													echo '<div class="form-group">';
													echo '<label for="universityData">เพิ่มข้อมูการศึกษา</label>';
													echo form_error('universityData', '<div class="form_error1">', '</div>');
													echo '<textarea  class="form-control" id="universityData" name="universityData">',$row_uni->uni_data.'</textarea>';
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
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>  <!-- /.end  cal-md-12 -->
	</div> <!-- / .end row -->

	<hr>

</div> <!-- /.end show history -->


<?php $this->load->view('admin/footer');?>