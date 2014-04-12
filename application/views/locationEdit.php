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
									<td width="40%">Location ID</td>
									<td>
										<input type="text" name="locationID" disabled="disable" class="text" value="<?php echo set_value('locationID', $this->form_data->locationID); ?>"/>
										<input type="hidden" name="locationID" value="<?php echo set_value('locationID', $this->form_data->locationID); ?>"/>
									</td>
								</tr>
								<tr>
									<td valign="top">Address<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="address" class="text" value="<?php echo set_value('address', $this->form_data->address); ?>"/>
										<?php echo form_error('address'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">City<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="city" class="text" value="<?php echo set_value('city', $this->form_data->city); ?>"/>
										<?php echo form_error('city'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">State Code<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="stateCode" class="text" value="<?php echo set_value('stateCode', $this->form_data->stateCode); ?>"/>
										<?php echo form_error('stateCode'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Zip<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="zip" class="text" value="<?php echo set_value('zip', $this->form_data->zip); ?>"/>
										<?php echo form_error('zip'); ?>
									</td>
								</tr>
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