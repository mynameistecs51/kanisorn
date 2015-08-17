<?php $this->load->view('header');?>

<div class="well"> <!-- show document-->

	<div class="text-left">
		<a class="btn btn-success">เอกสารประกสอบการเรียน</a>
	</div>

	<hr>

	<div class="row">
		<div class="col-md-12">
			<?php foreach ($show_doc as $row_doc) : ?>
				<p>
					<b><?php echo $row_doc->file_subName;?></b>
					<span class="pull-right text-warning">
						<?php
						echo anchor('Welcome/download/'.$row_doc->file_docPath, '<--Download');
						?>
					</span>
					<br/><?php echo $row_doc->file_docDetail;?>
				</p>
				<hr/>
			<?php endforeach ?>
		</div>
	</div>
</div> <!-- /.end show document -->

<?php $this->load->view('footer');?>