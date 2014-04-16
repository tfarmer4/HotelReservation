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
									<td width="40%">User ID</td>
									<td>
										<input type="text" name="userID" disabled="disable" class="text" value="<?php echo set_value('userID', $this->form_data->userID); ?>"/>
										<input type="hidden" name="userID" value="<?php echo set_value('userID', $this->form_data->userID); ?>"/>
									</td>
								</tr>
								<tr>
									<td valign="top">Username<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="uName" class="text" value="<?php echo set_value('uName', $this->form_data->uName); ?>"/>
										<?php echo form_error('uName'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Password<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="pass" class="text" value="<?php echo set_value('pass', $this->form_data->pass); ?>"/>
										<?php echo form_error('pass'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Address 1<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="address1" class="text" value="<?php echo set_value('address1', $this->form_data->address1); ?>"/>
										<?php echo form_error('address1'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Address 2<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="address2" class="text" value="<?php echo set_value('address2', $this->form_data->address2); ?>"/>
										<?php echo form_error('address2'); ?>
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
									<td valign="top">Phone<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="phone" class="text" value="<?php echo set_value('phone', $this->form_data->phone); ?>"/>
										<?php echo form_error('phone'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">First Name<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="fName" class="text" value="<?php echo set_value('fName', $this->form_data->fName); ?>"/>
										<?php echo form_error('fName'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Last Name<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="lName" class="text" value="<?php echo set_value('lName', $this->form_data->lName); ?>"/>
										<?php echo form_error('lName'); ?>
									</td>
								</tr>
								<tr>
									<td valign="top">Salt<span style="color:red;">*</span></td>
									<td>
										<input type="text" name="salt" class="text" value="<?php echo set_value('salt', $this->form_data->salt); ?>"/>
										<?php echo form_error('salt'); ?>
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