<!-- BEGIN PAGE -->
<div class="page-content">
	<!-- BEGIN PAGE CONTAINER-->
	<div class="container-fluid">
		<br />
		<br />
		<div id="dashboard">
			<!-- BEGIN DASHBOARD STATS -->
			<div class="row-fluid">
				<div class="span">
					<!-- BEGIN SAMPLE TABLE PORTLET-->
					<div class="portlet box red">
						<div class="portlet-title">
							<h4><i class="icon-cogs"></i><?php echo $title; ?></h4>
						</div>
						<div class="portlet-body">
							<table>
								<tr>
									<td width="30%"><b>Hotel ID</b></td>
									<td><?php echo $obj->hotelID; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Location</b></td>
									<td><?php echo $obj->location; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Hotel Name</b></td>
									<td><?php echo $obj->hotelName; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Hotel URL</b></td>
									<td><?php echo $obj->hotel_URL; ?></td>
								</tr>
							</table>
						</div>
					</div>
					<!-- END SAMPLE TABLE PORTLET-->
				</div>
			</div>
			<?php echo $link_back; ?>
			<!-- END DASHBOARD STATS -->
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- END PAGE CONTAINER-->		
</div>
<!-- END PAGE -->
