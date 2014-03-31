<!-- BEGIN PAGE -->
<div class="page-content">
	<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<div id="portlet-config" class="modal hide">
		<div class="modal-header">
			<button data-dismiss="modal" class="close" type="button"></button>
			<h3>Widget Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here will be a configuration form</p>
		</div>
	</div>
	<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<br />
		<br />
		<div id="dashboard">
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row-fluid">
			<?php if(empty($error)): ?>
				<div class="span">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<h4><i class="icon-cogs"></i>All Hotels</h4>
						</div>
						<div class="portlet-body">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Hotel ID</th>
										<th>Location</th>
										<th>Hotel Name</th>
										<th>Hotel URL</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($hotels as $key => $obj): ?>
										<tr>
											<td><?php echo $obj["hotelID"]; ?></td>
											<td><?php echo $obj["location"]; ?></td>
											<td><?php echo $obj["hotelName"]; ?></td>
											<td><?php echo $obj["hotel_URL"]; ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			<?php else:
					echo $error;
				endif;
			?>
			</div>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- END PAGE CONTAINER-->		
</div>
<!-- END PAGE -->