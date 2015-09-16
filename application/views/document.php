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
						$id = array();
						$b = array();

						foreach ($show_subj as $key => $row_subj):
						// 	$id = array('id'=>$row_subj->subj_id);
						// $name = $row_subj->subj_name.',';
						// print_r($name);
						echo '<li class="active"><a href="#tab'.$row_subj->subj_id.'" data-toggle="tab">'.$row_subj->subj_name.'</a></li>';
						//echo '<li class="active"><a href="#tab'.$key[1].'" data-toggle="tab">'.$row_subj->subj_name.'</a></li>';
						?>

					</ul>
				</div>
				<div class="panel-body">
					<div class="tab-content">
						<div class="tab-pane fade in active" id="tab1<?php echo $row_subj->subj_id;?>">  <!-- show subj 1 -->
							<div class="panel panel-success">
								<div class="panel-heading">รายการ</div>
								<div class="panel-body">
									<?php echo $row_subj->subj_name;?>
								</div>  <!-- end panal body -->
							</div>  <!-- panel panel-success -->
						</div>  <!-- end show subj 1 -->
					</div>
				</div>

			<?php endforeach; ?>
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