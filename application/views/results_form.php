<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Select Room</title>
	<link href="../Main.css" rel="stylesheet"/>
    </head>

    <body>
	
	<div id="main" class="default">

	<input type="hidden" name="start_page" value="Y" />

	<input type="hidden" name="showXDPop" value="Y" />

	
	<h1> Select A Room </h1>
	<h3 style="color: red;"> <?php echo $hotelName. "<br />"; ?> </h3>
	<img src="http://students.csci.unt.edu/~eks0069/hotel-reservation-site/application/images/PRICE-LINK.jpg" width="256px" height="256"/><p></P>
		<h5>
			<?php echo $address; ?><br>
			<?php echo $city.", ".$stateCode." ".$zip; ?><br>
			<a href="http://<?php echo $hotel_URL;?>"> Visit our site! </a>		
		</h5>		
	
	</div>	

	</body>
	
</html>