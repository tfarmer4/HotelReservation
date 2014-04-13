<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Search for Hotels in Texas</title>
    </head>

    <body>

<!-- hotels search form -->
    <div id="main" class="default">

	<input type="hidden" name="start_page" value="Y" />

	<input type="hidden" name="showXDPop" value="Y" />



			
	<h1>Search for Hotels in Texas</h1>
			
	<label for="hotel-dest" class="select">
	<span class="select-placeholder">Select City</span>
	<select placeholder="Select City" id="hotel-dest" name="cityname">
		<option value="1">Dallas</option>
		<option value="2">San Antonio</option>
		<option value="3">Houston</option>
		<option value="4">Austin</option>
		<option value="5">El Paso</option>
		<option value="6">Corpus Christi</option>
	</select>						
	</label>

	<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
	<script>   
    $(function() {
         $( "#datepickerIn" ).datepicker();   
	 $( "#datepickerOut").datepicker();
    }); 
	</script>
	<label for="hotel-checkin" class="calendar-input">
	Check-In
	<input name="checkInDate" preformat="" type="text" id="datepickerIn" placeholder="Choose Date" autocomplete="off" >
	</label>	
	<label for="hotel-checkout" class="calendar-input margin-change">
	Check-Out
	<input name="checkOutDate" preformat="" type="text" id="datepickerOut" placeholder="Choose Date" autocomplete="off" >	
	</label>
	
			
	<label for="hotel-rooms" class="select"> 
	<span class="select-placeholder">Select Room Quantity</span>
	<select id="hotel-rooms" name="numberOfRooms">
		<option value="1">1 Room</option>
		<option value="2">2 Rooms</option>
		<option value="3">3 Rooms</option>
		<option value="4">4 Rooms</option>
		<option value="5">5+ Rooms</option>
	</select>
	</label>						
	<button id="hotel-btn-submit-retl" class="button primary large" type="submit" value="retl" >Search Hotels</button>
	</form></div> 


    </body>
</html>

