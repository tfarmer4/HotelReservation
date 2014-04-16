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
									<td width="40%">Reservation ID</td>
									<td>
										<input type="text" name="reservationID" disabled="disable" class="text" value="<?php echo set_value('reservationID', $this->form_data->reservationID); ?>"/>
										<input type="hidden" name="reservationID" value="<?php echo set_value('reservationID', $this->form_data->reservationID); ?>"/>
									</td>
								</tr>
								<tr>
									<td valign="top">Guest<span style="color:red;">*</span></td>
									<td>
										<select name="FK_guestID">
											<?php
												foreach($guests as $guest) {
													if($guest->guestID == $this->form_data->FK_guestID) {
														echo '<option value="'. $guest->guestID .'" selected="selected">' . $guest->fName . ' ' . $guest->lName . '</option>';
													} else {
														echo '<option value="'. $guest->guestID .'">' . $guest->fName . ' ' . $guest->lName . '</option>';
													}
												}
											?>
										</select>
										<?php echo form_error('FK_guestID'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">User<span style="color:red;">*</span></td>
									<td>
										<select name="FK_userID">
											<?php
												foreach($users as $user) {
													if($user->userID == $this->form_data->FK_userID) {
														echo '<option value="'. $user->userID .'" selected="selected">' . $user->uName . '</option>';
													} else {
														echo '<option value="'. $user->userID .'">' . $user->uName . '</option>';
													}
												}
											?>
										</select>
										<?php echo form_error('FK_userID'); ?>
									</td>
								</tr>
								<tr>
									<td>Check In Date</td>
									<td>
										<input type="text" name="checkinDate" class="text" value="<?php echo set_value('checkinDate', $this->form_data->checkinDate); ?>"/>
									</td>
								</tr>
								<tr>
									<td>Check Out Date</td>
									<td>
										<input type="text" name="checkoutDate" class="text" value="<?php echo set_value('checkoutDate', $this->form_data->checkoutDate); ?>"/>
									</td>
								</tr>
								<tr>
									<td>Total Price</td>
									<td>
										<input type="text" name="totalPrice" class="text" value="<?php echo set_value('totalPrice', $this->form_data->totalPrice); ?>"/>
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