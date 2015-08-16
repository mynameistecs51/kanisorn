<?php $this->load->view('admin/header');?>

<div class="well"> <!-- show cantact-->

	<div class="text-left">
		<a class="btn btn-success"> จัดการเอกสารประกอบการสอน</a>
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
							<input type="text" class="form-control" id="input_docName" name="input_docName" > <br/>
						</div>

						<label for="file_doc" class="col-sm-2 control-label" >เพิ่มไฟล์</label>
						<div class="col-sm-4 ">
							<input type="file" id="file_doc" class="form-control" name="file_doc" size="20" />
							<div class="progress">
								<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
									<span class="sr-only">Loading %</span>
								</div>
							</div>
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
			<div class="panel panel-success">
				<div class="panel-heading">รายการ</div>
				<div class="panel-body">
					test
				</div>
			</div>
		</div>
	</div>

	<hr>

</div> <!-- /.end show contact -->
<script type="text/javascript">
</script>
<?php $this->load->view('admin/footer');?>