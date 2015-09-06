<?php $this->load->view('admin/header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> จัดการตารางสอน </a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-heading">จัดการตารางสอน</div>
				<div class="panel-body ">
					<?php echo form_open_multipart('Welcome/insert_table',' class="form-horizontal" role="form" ');?>
					<div class="form-group col-sm-12">
						<label for="num_trem" class="col-md-2 control-label">ปีการศึกษา </label>
						<div class="col-sm-4">
							<input type="text" class="form-control" id="num_trem" name="num_trem" value="<?php echo set_value('num_trem');?>"> 
							<?php echo form_error('num_trem', '<div class="form_error1">', '</div>');?>
							<br/>
						</div>

						<label for="file_table" class="col-sm-2 control-label" >เพิ่มไฟล์</label>
						<div class="col-sm-4 ">
							<input type="file" id="file_table" class="form-control" name="file_table" value="" size="20" />
							<?php
							if(!empty($file_error)){
								echo '<div class="form_error1">::',$file_error.'::</div>';
							}else{
								echo '
								<div class="text-helper" style="color:red;">
									.jpg,png
								</div>
								';
							}
							?>
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
			<?php 
				foreach ($this->db->get('table_teacher')->result() as $row_table) {
					echo '<img class="col-md-12" src="'.base_url().'files_upload/file_picture/'.$row_table->table_name.'"/>';
				}
			?>
			<!-- <img class="col-md-12" src="<?php echo base_url();?>files_upload/16-8-255813-31-10.jpg"/> -->
		</div>
	</div>

	<hr>

</div> <!-- /.end show history -->

<?php $this->load->view('footer');?>