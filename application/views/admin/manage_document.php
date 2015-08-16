<?php $this->load->view('admin/header');?>
<style type="text/css">
	.form_error1 {
		color: red;
		position:absolute;
		display: inline;
	}
</style>
<div class="well"> <!-- show cantact-->

	<div class="text-left">
		<a class="btn btn-success"> จัดการเอกสารประกอบการสอน ///เหลือ ลบกับแก้ไข</a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">จัดการเอกสาร</div>
				<div class="panel-body ">
					<?php echo form_open_multipart('Welcome/add_document',' class="form-horizontal" role="form" ');?>
					<div class="form-group col-sm-12">
						<label for="input_docName" class="col-md-2 control-label">ชื่อวิชา </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="input_docName" name="input_docName" value="<?php echo set_value('input_docName');?>"> 
							<?php echo form_error('input_docName', '<div class="form_error1">', '</div>');?>
							<br/>
						</div>

						<label for="file_doc" class="col-sm-2 control-label" >เพิ่มไฟล์</label>
						<div class="col-sm-4 ">
							<input type="file" id="file_doc" class="form-control" name="file_doc" value="" size="20" />
							<?php
							if(!empty($file_error)){
								echo '<div class="form_error1">::',$file_error.'::</div>';
							}else{
								echo '
								<div class="progress">
									<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
										<span class="sr-only">Loading %</span>
									</div>
								</div>
								';
							}
							?>
						</div>
					</div>
					<div class="form-group col-sm-12">
						<label for="input_docDetail" class="col-md-2 control-label">รายละเอียดวิชา</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="input_docDetail" name="input_docDetail" ></textarea>
							<label class="text-helper" style="color:red">**กรอกรายละเอียดพอสังเขป**</label>
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
			<!-- show data document -->
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
								<?php $count_ = count($show_doc);?>
								<?php foreach ($show_doc as $row_doc):?>
									<tr class="text-center">
										<td><?php echo $count_--;?></td>
										<td class='text-left'>
											<b><?php echo $row_doc->file_subName;?></b>
											<br/><?php echo $row_doc->file_docDetail;?>
										</td>
										<td><?php echo anchor('Welcome/del_docID/'.$row_doc->file_docId,' ลบ');?></td>
										<td>
											<?php echo anchor('#','แก้ไข','data-toggle="modal" data-target="#myModal'.$row_doc->file_docId.'"');?>
										</td>
									</tr>
									<!-- Modal -->
									<div class="modal fade" id="myModal<?php echo $row_doc->file_docId;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
										<div class="modal-dialog" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Modal title</h4>
												</div>
												<div class="modal-body">
													<?php
													echo form_open('Welcome/update_uni','class="inline" role="form"');
													echo '<input type="hidden" name="file_docId" value="'.$row_doc->file_docId.'"';
													echo '<div class="form-group">';
													echo '<label for="universityData">เพิ่มข้อมูการศึกษา</label>';
													echo form_error('universityData', '<div class="form_error1">', '</div>');
													echo '<textarea  class="form-control" id="universityData" name="universityData">',$row_doc->uni_data.'</textarea>';
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
		</div>
	</div>

	<hr>

</div> <!-- /.end show contact -->
<script type="text/javascript">
</script>
<?php $this->load->view('admin/footer');?>