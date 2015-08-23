<?php $this->load->view('header');?>

<div class="well"> <!-- show hitory -->

	<div class="text-left">
		<a class="btn btn-success"> แสดงงานวิจัย </a>
	</div>
	<hr/>
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

<?php $this->load->view('footer');?>