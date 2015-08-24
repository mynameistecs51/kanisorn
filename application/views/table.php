<?php $this->load->view('header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> ตารางสอน </a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
		<?php foreach ($table_taecher as $row_table) {
			echo '<img class="col-md-12" src="'.base_url().'files_upload/'.$row_table->table_name.'"/>';
		}
		?>
		</div>
	</div>

	<hr>

</div> <!-- /.end show history -->

<?php $this->load->view('footer');?>