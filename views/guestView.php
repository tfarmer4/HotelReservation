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
									<td width="30%"><b>Guest ID</b></td>
									<td><?php echo $obj->guestID; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>First Name</b></td>
									<td><?php echo $obj->fName; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Last Name</b></td>
									<td><?php echo $obj->lName; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Address 1</b></td>
									<td><?php echo $obj->address1; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Address 2</b></td>
									<td><?php echo $obj->address2; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>City</b></td>
									<td><?php echo $obj->city; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>State Code</b></td>
									<td><?php echo $obj->stateCode; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Post Code</b></td>
									<td><?php echo $obj->postCode; ?></td>
								</tr>
								<tr>
									<td valign="top"><b>Phone</b></td>
									<td><?php echo $obj->phone; ?></td>
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