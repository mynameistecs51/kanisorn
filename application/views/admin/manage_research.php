<?php $this->load->view('admin/header');?>

<!--
<script src="<?php echo base_url();?>js/dropzone.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/dropzone.scss">
-->
<div class="well"> <!-- show hitory -->
	<div class="panel panel-primary">
		<div class="panel-heading">จัดการเอกสาร</div>
		<div class="panel-body ">
			<?php echo form_open_multipart('Welcome/insert_research/',' class="form-horizontal "  role="form" ');?>
			<div class="form-group col-sm-12">
				<label for="input_docName" class="col-md-2 control-label">ชื่อวิชางานวิจัย </label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="input_docName" name="input_docName" > <br/>
				</div>

				<label for="file_doc" class="col-sm-2 control-label" >เพิ่มไฟล์ .pdf</label>
				<div class="col-sm-4  ">
					<input type="file" id="file_doc" class="form-control" name="file_research[0]" size="20" />
					<div class="progress">
						<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
							<span class="sr-only">Loading %</span>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label for="input_docDetail" class="col-md-2 control-label">ภาพกิจกรรม</label>
				<div class="col-sm-10  "  >
					<input type="file" name="file_research[]" class="form-control"   id="files_pic[]" multiple=""   />
					<output id="list"></output>
					<label class="text-helper" style="color:red">**เพิ่มไม่เกิน 4 ภาพ**</label>
					<div class="dz-default dz-message"></div>
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
					<label><input type="radio" id='national' checked="true" name="research_type" value="national">Natinal </label>&nbsp;&nbsp;
					<label><input type="radio" id="international" name="research_type" value="international">Internation</label>
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
											<th class="text-center col-md-1">แก้ไข</th>
											<th class="text-center col-md-1">ลบ</th>
										</tr>
									</thead>
									<?php foreach ($this->db->where('res_type','national')->get('research')->result() as $research): ?>
										<tr>
											<td><?php echo count($inter_research--);?></td>
											<td>
												<?php echo "<b>".$research->res_name."</b><br/>". substr($research->res_detail,0,100);?>
											</td>
											<td>edit</td>
											<td>delete</td>
										</tr>
									<?php endforeach ?>
									<tbody>
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
									<?php foreach ($this->db->where('res_type','international')->get('research')->result() as $research): ?>
										<tr>
											<td><?php echo count($inter_research--);?></td>
											<td>
											<?php echo "<b>".$research->res_name."</b><br/>". substr($research->res_detail,0,100);?>
											</td>
											<td>edit</td>
											<td>delete</td>
										</tr>
									<?php endforeach ?>
									<tbody>
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
document.getElementById('files_pic[]').addEventListener('change', handleFileSelect, false);

</script>
<?php $this->load->view('footer');?>