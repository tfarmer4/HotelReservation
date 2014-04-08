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
									<td width="40%"><b>Reservation ID</b></td>
									<td><?php echo $obj->reservationID; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Guest Name</b></td>
									<td><?php echo $obj->guestName; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Check In Date</b></td>
									<td><?php echo $obj->checkinDate; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Check Out Date</b></td>
									<td><?php echo $obj->checkoutDate; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Username</b></td>
									<td><?php echo $obj->uName; ?></td>
								</tr>
								<tr>
									<td valign="top">Room(s) Booked</td>
									<td></td>
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