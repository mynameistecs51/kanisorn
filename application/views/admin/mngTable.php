<?php $this->load->view('admin/header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> จัดการตารางสอน </a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<?php if (count($this->db->get('table_teacher')->result() ) <= 0 ) { ?>
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
							<output id="list"></output>
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
			<?php } ?>
			<?php foreach ($this->db->get('table_teacher')->result() as $row_table) :  ?>

				<?php echo anchor('#', "Update Table", 'class="btn btn-primary pull-left" data-toggle="modal" data-target="#myModal'.$row_table->table_id.'" '); ?>
				<?php echo anchor('Welcome/delete_table/'.$row_table->table_name, "Delete Table", 'class="btn btn-danger pull-right" '); ?>
				<br/>
				<br/>
				<?php echo '<img class="col-md-12" src="'.base_url().'files_upload/file_picture/'.$row_table->table_name.'"/>';?>

				<div class="modal fade" id="myModal<?php echo $row_table->table_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<h4 class="modal-title" id="myModalLabel">อัพเดท งานวิจัย</h4>
							</div>
							<div class="modal-body row">
								<?php echo form_open_multipart('Welcome/update_table',' class="form-horizontal" role="form" ');?>
								<input type="hidden" name='value' value="<?php echo $row_table->table_name;?>">
								<div class="form-group col-sm-12">
									<label for="num_trem" class="col-md-2 control-label">ปีการศึกษา </label>
									<div class="col-sm-4">
										<input type="text" class="form-control" id="num_trem" name="num_trem" value="<?php echo $row_table->table_trem;?>">
										<?php echo form_error('num_trem', '<div class="form_error1">', '</div>');?>
										<br/>
									</div>

									<label for="file_table" class="col-sm-2 control-label" >เพิ่มไฟล์</label>
									<div class="col-sm-4 ">
										<input type="file" id="file_table" class="form-control" name="file_table" value="" size="20" />
										<output id="list"></output>
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
					</div>
				</div>

			</div>
		</div>
	<?php endforeach	?>
	<!-- <img class="col-md-12" src="<?php echo base_url();?>files_upload/16-8-255813-31-10.jpg"/> -->
</div>
</div>

<hr>

</div> <!-- /.end show history -->
<script type="text/javascript">
	function handleFileSelect(evt) {
		var files = evt.target.files;

    		// Loop through the FileList and render image files as thumbnails.
    		for (var i = 0, f; f = files[i]; i++) {

    		  // Only process image files.
    		  if (!f.type.match('image.*')) {
    		  	continue;
    		  }

    		  var reader = new FileReader();

     		 // Closure to capture the file information.
     		 reader.onload = (function(theFile) {
     		 	return function(e) {
       		   // Render thumbnail.
       		   var span = document.createElement('span');
       		   span.innerHTML =
       		   [
       		   '<img style="height: 75px; border: 1px solid #000; margin: 5px" src="',
       		   e.target.result,
       		   '" title="', escape(theFile.name),
       		   '"/>'
       		   ].join('');

       		   document.getElementById('list').insertBefore(span, null);
       		};
       	})(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
   }
}
document.getElementById('file_table').addEventListener('change', handleFileSelect, false);

</script>
<?php $this->load->view('footer');?>