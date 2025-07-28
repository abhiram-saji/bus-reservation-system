							
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>online booking</title>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Movie Ticket Booking Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href='//fonts.googleapis.com/css?family=Kotta+One' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/jquery.seat-charts.js"></script>
</head>
<body>
<div class="wrap">
			<!---start-header--->
			<div class="header">
			<!---start-top-header--->
			<div class="top-header">
				
				
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<div class="sub-header">
				
<!--				<div class="sub-header-right">
                                                           
					<ul>
                                            <li><a href="login.php">log in</a></li>
                                            <li><a href="signup.php">signup</a></li>
						
					</ul>
				</div>-->
				<div class="clear"> </div>
			</div>
			<div class="clear"> </div>
			<div class="top-nav">
                             <?php
                             session_start();
   include 'connection.php';
  // include 'connection.php';
   $id=$_SESSION['id'];
  
  $sql="select * from signup where loginId='$id'" ;
  $res=  mysqli_query($conn,$sql);
  while($res1=mysqli_fetch_assoc($res))
  {
      ?>
				<ul style="color: white;margin-top: 80px; background-image:url('images/a10.jpg');background-size: cover;">
                                 
                                      
					<li style="float:right"><b><a href="logout.php" style="color:red;font-size: 50px;">(<?php echo $res1['name']; ?>)</a></b></li> 
					<div class="clear"> </div>
				</ul>
                               <?php
  }                                        
  ?>
			</div>
			<!---end-top-header--->
			<!---End-header--->
			</div>





<div class="content">
	<h1><a href="films.php">films</a></h1>
	<h1>Movie Ticket Booking</h1>
	<div class="main">
		<h2></h2>
		<div class="demo">
			<div id="seat-map">
				<div class="front">SCREEN</div>					
			</div>
			<div class="booking-details">
				<ul class="book-left">
					<li>Movie </li>
					<li>Time </li>
					<li>Tickets</li>
					<li>Total</li>
					<li>Seats :</li>
				</ul>
				<ul class="book-right">
                                    <?php
                                    include 'connection.php';
                             $theatrename=$_GET['theatre'];
                             $teater_id=$_GET['teater_id'];
        $district=$_GET['district'];
                                    $name=$_GET['name'];
                                    $time=$_GET['time'];
                                    $Date=date("d/m/y");
                                    ?>
                                    <li>:<?php echo $name;?></li>
                                    <li>:<?php echo $Date;?>    <?php echo $time;?></li>
					<li>: <span id="counter">0</span></li>
					<li>: <b><i></i><span id="total">0</span></b></li>
				</ul>
				<div class="clear"></div>
				<ul id="selected-seats" class="scrollbar scrollbar1"></ul>
			
						
				<button class="checkout-button" onclick="bookNow();">Book Now</button>	
                                <form action="cancel.php" method="post">
                                    <input type="hidden" name="filmname" value="<?php echo $name?>"/>
                                    <input type="hidden" name="time" value="<?php echo $time?>"/>
                                   
                                </form>
				<div id="legend"></div>
			</div>
			<div style="clear:both"></div>
	    </div>

			<script type="text/javascript">
                            seats='';
                            <?php
                            $seseats='';
                           $ar=array();
                            $se="select bookedseats from book where filmname='$name' && time='$time'";
                            $se1=  mysqli_query($conn, $se);
                            while($se2=  mysqli_fetch_assoc($se1))
                            {
                                array_push($ar, $se2['bookedseats']);
                            
                                
                            }
                          $seseats=  implode(',', $ar);
                                    ?>
                                          
                            str1='<?php echo $seseats?>';
                                         
                                function remove(array, element) {
                                    const index = array.indexOf(element);
                                    array.splice(index, 1);
                                }
                                
                                function bookNow() {
                                    alert(seats);
                                    window.location.href=["bookseats.php?name=","<?php echo $name ?>","&teater_id=","<?php echo $teater_id ?>","&time=","<?php echo $time ?>","&theatre=","<?php echo  $theatrename;?>","&district=","<?php echo  $district;?>","&seats=",seats].join('') ;
                                } 
                                
				var price = 100; //price
				$(document).ready(function() {
					var $cart = $('#selected-seats'), //Sitting Area
					$counter = $('#counter'), //Votes
					$total = $('#total'); //Total money
			
                                var sc = $('#seat-map').seatCharts({
						map: [  //Seating chart
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'__________',
							'aaaaaaaa__',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'aaaaaaaaaa',
							'__aaaaaa__'
						],
						naming : {
							top : false,
							getLabel : function (character, row, column) {
								return column;
							}
						},
						legend : { //Definition legend
							node : $('#legend'),
							items : [
								[ 'a', 'available',   'Available' ],
								[ 'a', 'unavailable', 'Sold'],
								[ 'a', 'selected', 'Selected']
							]					
						},
						click: function () { //Click event
							if (this.status() == 'available') { //optional seat
                                                                if (seats == "")
                                                                    seats = [[this.settings.row+1,this.settings.label].join('_')].join(',');
                                                                else
                                                                    seats = [seats,[this.settings.row+1,this.settings.label].join('_')].join(',');
                                                                
								$('<li>Row'+(this.settings.row+1)+' Seat'+this.settings.label+'</li>')
									.attr('id', 'cart-item-'+this.settings.id)
									.data('seatId', this.settings.id)
									.appendTo($cart);

								$counter.text(sc.find('selected').length+1);
								$total.text(recalculateTotal(sc)+price);
											
								return 'selected';
							} else if (this.status() == 'selected') { //Checked
									//Update Number
                                                                        a=seats.split(",");
                                                                        a1=[this.settings.row+1,this.settings.label].join('_');
                                                                        remove(a,a1);
                                                                        seats = a.join(',');
                                                                        
                                                                       //optional
									$counter.text(sc.find('selected').length-1);
									//update totalnum
									$total.text(recalculateTotal(sc)-price);
                                                                       
									//Delete reservation
									$('#cart-item-'+this.settings.id).remove();
									//optional
									return 'available';
							} else if (this.status() == 'unavailable') { //sold
								return 'unavailable';
							} else {
								return this.style();
							}
						}
					});
					//sold seat
					sc.get(str1.split(",")).status('unavailable');
						
				});
				//sum total money
				function recalculateTotal(sc) {
					var total = 0;
					sc.find('selected').each(function () {
						total += price;
					});
							
					return total;
				}
			</script>
	</div>
	<p class="copy_rights"></a></p>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
