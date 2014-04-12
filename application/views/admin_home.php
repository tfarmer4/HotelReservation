<<<<<<< HEAD
<!-- MAIN CONTENT -->
	<div id="content">
		
		<div class="page-full-width cf">

			<div class="content-module">
			
				<div class="content-module-heading cf">
					<h3 class="fl">QualityClix Page Views</h3>
					<span class="fr expand-collapse-text">Click to collapse</span>
					<span class="fr expand-collapse-text initial-expand">Click to expand</span>
				</div> <!-- end content-module-heading -->
				
				
				<div class="content-module-main">
                	<style type="text/css">
						.ui-datepicker-calendar {
							display: none;
						}​
					</style>
                    <form id="change_password_form" action="" method="" style="margin: 10px 20px;">
                        <div class="message-box round"></div>
                        <p>
                            <label for="month_year" style="display: inline;">Date Range:</label>
                            <input id="month_year" name="month_year" tabindex="1" class="datepicker round default-width-input" type="text" value="<?php echo date("F Y"); ?>" style="padding: 3px; width: 100px;" />
                            <input value="Apply" id="submit" name="submit" class="set_date_range round blue ic-right-arrow" type="submit" style="padding: 6px 30px 6px 6px;" />
                        </p>
                        
                    </form>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/graph/js/highcharts.js"></script>
                    <script type="text/javascript" src="<?php echo base_url(); ?>assets/admin/graph/js/modules/exporting.js"></script>
                    <script type="text/javascript">
						$(function () {
							var chart;
							var options = {
								chart: {
									renderTo: 'graph_container',
									defaultSeriesType: 'area',
									marginRight: 130,
									marginBottom: 25
								},
								title: {
									text: 'Daily Visits',
									x: -20 //center
								},
								subtitle: {
									text: '',
									x: -20
								},
								xAxis: {
									type: 'datetime',
									labels: {
										formatter: function() {
											return Highcharts.dateFormat('%b %d', this.value);
										}
									}
								},
								yAxis: {
									title: {
										text: 'Visits'
									},
									plotLines: [{
										value: 0,
										width: 1,
										color: '#808080'
									}]
								},
								tooltip: {
									formatter: function() {
										return '<b>' + Highcharts.dateFormat('%A, %b %d, %Y', this.x + 86400000) + '</b><br />' + this.series.name + ':<b>' + this.y + '</b>';
									}
								},
								legend: {
									layout: 'vertical',
									align: 'right',
									verticalAlign: 'top',
									x: -10,
									y: 100,
									borderWidth: 0
								},
								plotOptions: {
									area: {
										fillOpacity: .2,
										marker: {
											radius: 4
										},
										stacking: 'normal'
									}
								},
								series: [{
									name: 'Visits'
								}]
							}
							
							function set_chart_data(month, year) {
								$.post(
									'<?php echo make_base_url("admin_home/extract_daily_visitors"); ?>',
									{"month": month, "year": year},
									function(data) {
										eval(data);
										for(var i = 0; i < data1.length; i++) {
											data1[i][0] = parseInt(Date.parse(data1[i][0]));
											data1[i][1] = parseInt(data1[i][1]);
										}
										options.series[0].data = data1;
					                    chart = new Highcharts.Chart(options);
									}
								);
							}
							set_chart_data(<?php echo date('m');?>, <?php echo date('Y')?>);
							$(".set_date_range").click(function() {
								var months = ["January", "Febraury", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
								var month_year = $("#month_year").val().split(" ");
								if(month_year[0] == "" || month_year[1] == "") {
									alert("Please provide a valid date???");	
								} else {
									set_chart_data(months.indexOf(month_year[0]) + 1, month_year[1]);
								}
								return false;
							});
						});
					</script>
                    <script type="text/javascript">
						(function($){
							$(function() {
								$(".datepicker").datepicker({
									changeMonth: true,
									changeYear: true,
									dateFormat: 'MM yy',
									showButtonPanel: true,
									
									onClose: function() {
										var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
										var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
										$(this).datepicker('setDate', new Date(iYear, iMonth, 1));
									},
									
									beforeShow: function() {
										if ((selDate = $(this).val()).length > 0) {
											iYear = selDate.substring(selDate.length - 4, selDate.length);
											iMonth = jQuery.inArray(selDate.substring(0, selDate.length - 5), 
											$(this).datepicker('option', 'monthNames'));
										}
									}
								});
							});	
						})(jQuery);
					</script>
                    <div id="graph_container"></div>
				</div> <!-- end content-module-main -->
			
			</div> <!-- end content-module -->
		
		</div> <!-- end full-width -->
			
	</div> <!-- end content -->
=======
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Home</title>
<link href="Main.css" rel="stylesheet"/>
</head>
<body>

<div id="main">
<h1>Admin Console</h1>

<h2>Manage Users</h2>
<div id="users">
	<?php echo form_open('admin_home/manageUsers');?>
	<table id="user_tbl" border="1">
	<?php $result_array = $this->admin_main_mdl->get_all_users();
	?>
	<tr><td>User Name</td><td>Admin</td></tr>
	<?php
	foreach ($result_array as $row)
	{
		$options = array(
                  'Admin_' . $row->uName  => 'Admin',
                  'User_' . $row->uName    => 'User',
                );

		
		echo '<tr><td>' . $row->uName . '</td><td>';
		if($row->isAdmin == true)
			echo form_dropdown($row->uName, $options, 'Admin_' . $row->uName);
		elseif($row->isAdmin == false)
			echo form_dropdown($row->uName, $options, 'User_' . $row->uName);
		echo '</td></tr>';
		
	}
	?>
	</table>
	<?php
	echo form_submit('submit_user_changes', 'Save Changes');
	echo form_close();?>
</div>
</div>
</body>
</html>
>>>>>>> c450fa35645459cc9a91b30c40c62a78d43bfb6e
