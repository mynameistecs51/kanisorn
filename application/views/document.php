<?php $this->load->view('header');?>

<div class="well"> <!-- show document-->

	<div class="text-left">
		<a class="btn btn-success">เอกสารประกสอบการเรียน</a>
	</div>
	<br/>
	<div class="row">
		<div class="col-md-12">
			<!-- show subject -->

			<div class="panel with-nav-tabs panel-default">
				<div class="panel-heading">
					<ul class="nav nav-tabs">
						<?php
						$num = count($show_doc);
						foreach ($show_subj as $row_subj):
							//echo '<li><a href="#tab'.$row_subj->subj_id.'" data-toggle="tab">'.$row_subj->subj_name.'</a></li>';
							echo  anchor('Welcome/document/'.$row_subj->subj_id	, $row_subj->subj_name, 'class="btn btn-success"');

							//echo '<li class="active"><a href="#tab1national" data-toggle="tab">'.$row_doc->subj_name.'</a></li>';

						?>
					<?php endforeach;?>
				</ul>
			</div>
			<div class="panel-body">
				<div class="tab-content">
					<?php foreach ($show_doc as $row_doc): ?>
						<b><?php echo $row_doc->subj_name;?></b>
						<div class="pull-right">
							---><?php echo anchor('Welcome/download/'.$row_doc->file_docPath,'Download');?><br/>
							---><?php echo anchor(base_url().'files_upload/file_document/'.$row_doc->file_docPath, 'ReadFile','target="_blank"');?>
						</div>
						<br/>
						<?php  echo substr($row_doc->file_docDetail,0,100);?>
						<hr/>
					<?php endforeach ?>
				</div>
			</div>
			<!-- ./ show subject -->
					<?php /*foreach ($show_doc as $row_doc) : ?>
						<p>
							<b><?php echo $row_doc->file_subName;?></b>
							<span class="pull-right text-warning">
								<?php
								echo anchor('Welcome/download/'.$row_doc->file_docPath, '<--Download')."<br/>";
								echo anchor(base_url().'files_upload/file_document/'.$row_doc->file_docPath, '<--ReadFile','target="_blank"');
								?>
							</span>
							<br/>
							<?php echo $row_doc->file_docDetail;?>
						</p>

						<hr/>
					<?php endforeach; */ ?>
				</div>
			</div>
		</div> <!-- /.end show document -->

		<?php $this->load->view('footer');?>