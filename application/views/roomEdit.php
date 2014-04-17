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
									<td width="40%">Room ID</td>
									<td>
										<input type="text" name="roomID" disabled="disable" class="text" value="<?php echo set_value('roomID', $this->form_data->roomID); ?>"/>
										<input type="hidden" name="roomID" value="<?php echo set_value('roomID', $this->form_data->roomID); ?>"/>
									</td>
								</tr>
								<tr>
									<td valign="top">Room Type<span style="color:red;">*</span></td>
									<td>
										<select name="FK_RoomTypeID">
											<?php
												foreach($roomTypes as $roomType) {
													if($roomType->roomTypeID == $this->form_data->FK_RoomTypeID) {
														echo '<option value="'. $roomType->roomTypeID .'" selected="selected">' . $roomType->roomDesc . '</option>';
													} else {
														echo '<option value="'. $roomType->roomTypeID .'">' . $roomType->roomDesc . '</option>';
													}
												}
											?>
										</select>
										<?php echo form_error('FK_RoomTypeID'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Hotel<span style="color:red;">*</span></td>
									<td>
										<select name="FK_HotelID">
											<?php
												foreach($hotels as $hotel) {
													if($hotel->hotelID == $this->form_data->FK_HotelID) {
														echo '<option value="'. $hotel->hotelID .'" selected="selected">' . $hotel->hotelName . '</option>';
													} else {
														echo '<option value="'. $hotel->hotelID .'">' . $hotel->hotelName . '</option>';
													}
												}
											?>
										</select>
										<?php echo form_error('FK_HotelID'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Is Booked?<span style="color:red;">*</span></td>
									<td>
										<input type="radio" name="isBooked" class="text" value="1" <?php if(set_value('isBooked', $this->form_data->isBooked) == "1") {echo 'checked="checked"'; } ?>/>Yes 
										<input type="radio" name="isBooked" class="text" value="0" <?php if(set_value('isBooked', $this->form_data->isBooked) == "0") {echo 'checked="checked"'; } ?>/>No
										<?php echo form_error('isBooked'); ?>
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