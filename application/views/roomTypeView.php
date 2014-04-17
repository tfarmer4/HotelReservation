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
									<td width="30%"><b>Room Type ID</b></td>
									<td><?php echo $obj->roomTypeID; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Room Price</b></td>
									<td><?php echo $obj->roomPrice; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Room Description</b></td>
									<td><?php echo $obj->roomDesc; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Is Smoking?</b></td>
									<td><?php echo ($obj->isSmoking == "1" ? "Yes" : "No"); ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Max Guests</b></td>
									<td><?php echo $obj->maxGuests; ?></td>
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