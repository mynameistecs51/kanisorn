<?php $this->load->view('header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> ประวัติด้านการศึกษา </a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<?php foreach ($get_university as $row_uni) {
				echo "<p>".$row_uni->uni_data,"</p>";
				//echo "<hr/>";
				//echo "<br/>";
			}
			?>
		</div>
	</div>

	<hr>

</div> <!-- /.end show history -->

<?php $this->load->view('footer');?>