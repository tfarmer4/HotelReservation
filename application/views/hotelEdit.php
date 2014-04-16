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
							<b><?php echo $message; ?></b>
							<form method="post" action="<?php echo $action; ?>">
							<div class="data">
							<table>
								<tr>
									<td width="40%">Hotel ID</td>
									<td>
										<input type="text" name="hotelID" disabled="disable" class="text" value="<?php echo set_value('hotelID', $this->form_data->hotelID); ?>"/>
										<input type="hidden" name="hotelID" value="<?php echo set_value('hotelID', $this->form_data->hotelID); ?>"/>
									</td>
								</tr>
								<tr>
									<td valign="top">Location ID<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="location" class="text" value="<?php echo set_value('location', $this->form_data->FK_locationID); ?>"/>
										<?php echo form_error('location'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Hotel Name<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="hotelName" class="text" value="<?php echo set_value('hotelName', $this->form_data->hotelName); ?>"/>
										<?php //echo form_error('hotelName'); ?>
									</td>
								</tr>
								<!--<tr>
									<td valign="top">Hotel URL<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="hotel_URL" class="text" value="<?php echo set_value('hotel_URL', $this->form_data->hotel_URL); ?>"/>
										<?php echo form_error('hotel_URL'); ?>
									</td>
								</tr>-->
								
								<tr>
									<td>&nbsp;</td>
									<td><input type="submit" value="Save"/></td>
								</tr>
							</table>
							</div>
							</form>
							<br />
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