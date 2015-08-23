<?php $this->load->view('admin/header');?>

<div class="well"> <!-- show hitory -->
	<div class="panel panel-primary">
		<div class="panel-heading">จัดการเอกสาร</div>
		<div class="panel-body ">
			<?php echo form_open_multipart('Welcome/#',' class="form-horizontal dropzone"   id="my-awesome-dropzone" role="form" ');?>
			<div class="form-group col-sm-12">
				<label for="input_docName" class="col-md-2 control-label">ชื่อวิชางานวิจัย </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="input_docName" name="input_docName" > <br/>
				</div>

				<label for="file_doc" class="col-sm-2 control-label" >เพิ่มไฟล์ .pdf</label>
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
				<label for="input_docDetail" class="col-md-2 control-label">ภาพกิจกรรม</label>
				<div class="col-sm-10 fallback">
					<input type="file" name="file" class="form-control"  multiple  />
					<label class="text-helper" style="color:red">**กรอกรายละเอียดพอสังเขป**</label>
				</div>
				<div class="dz-preview dz-file-preview">
					<div class="dz-details">
						<div class="dz-filename"><span data-dz-name></span></div>
						<div class="dz-size" data-dz-size></div>
						<img data-dz-thumbnail />
					</div>
					<div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
					<div class="dz-success-mark"><span>✔</span></div>
					<div class="dz-error-mark"><span>✘</span></div>
					<div class="dz-error-message"><span data-dz-errormessage></span></div>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label for="input_docDetail" class="col-md-2 control-label">รายละเอียด</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="input_docDetail" name="input_docDetail" ></textarea>
					<label class="text-helper" style="color:red">**กรอกรายละเอียดพอสังเขป**</label>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label for="input_docDetail" class="col-md-2 control-label">ประเภทงานวิจัย</label>
				<div class="radio col-sm-10">
					<label><input type="radio" id='national' checked="true" name="research_type">Natinal </label>&nbsp;&nbsp;
					<label><input type="radio" id="international" name="research_type">Internation</label>
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
	<!-- show data reseacrh -->
	<ul class="nav nav-tabs " role="tablist">
		<li role="presentation" class="active"><a href="#national" aria-controls="national" role="tab" data-toggle="tab">National</a></li>
		<li role="presentation"><a href="#international" aria-controls="international" role="tab" data-toggle="tab">International</a></li>
	</ul>

	<!-- Tab panes  show contant -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="national">...</div>
		<div role="tabpanel" class="tab-pane" id="international">...</div>
	</div>
	<hr>

</div> <!-- /.end show history -->
<script src="<?php echo base_url();?>js/dropzone.js" ></script>
<script type="text/javascript">
	$( document ).ready(function() {
		Dropzone.autoDiscover = false;

		$(function() {
			var myDropzone = new Dropzone("#my-dropzone");
			myDropzone.on("addedfile", function(file) {
			});
		})
	});
</script>

<?php $this->load->view('footer');?>