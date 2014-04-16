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
									<td width="50%">Room Type ID</td>
									<td>
										<input type="text" name="roomTypeID" disabled="disable" class="text" value="<?php echo set_value('roomTypeID', $this->form_data->roomTypeID); ?>"/>
										<input type="hidden" name="roomTypeID" value="<?php echo set_value('roomTypeID', $this->form_data->roomTypeID); ?>"/>
									</td>
								</tr>
								<tr>
									<td valign="top">Room Price<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="roomPrice" class="text" value="<?php echo set_value('roomPrice', $this->form_data->roomPrice); ?>"/>
										<?php echo form_error('roomPrice'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Room Description<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="roomDesc" class="text" value="<?php echo set_value('roomDesc', $this->form_data->roomDesc); ?>"/>
										<?php echo form_error('roomDesc'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Is Smoking?<span style="color:red;">*</span></td>
									<td>
										<input type="radio" name="isSmoking" class="text" value="1" <?php if(set_value('isSmoking', $this->form_data->isSmoking) == "1") {echo 'checked="checked"'; } ?>/>Yes 
										<input type="radio" name="isSmoking" class="text" value="0" <?php if(set_value('isSmoking', $this->form_data->isSmoking) == "0") {echo 'checked="checked"'; } ?>/>No
										<?php echo form_error('isSmoking'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Max Guests<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="maxGuests" class="text" value="<?php echo set_value('maxGuests', $this->form_data->maxGuests); ?>"/>
										<?php echo form_error('maxGuests'); ?>
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