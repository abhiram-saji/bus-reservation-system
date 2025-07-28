<?php
include 'header.php'
?>
 <div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <br>
                        <!-- <h5 class="section-booking-title pe-3">Booking</h5>
                        <h1 class="text-white mb-4">Online Booking</h1> -->
</div>
<?php
$start=$_POST['start'];
$destiny=$_POST['destiny'];
$date=$_POST['date'];
include '../connection.php';  

$sql="select * from route where start='$start' and destiny='$destiny' ";
if(mysqli_num_rows($r=mysqli_query($con,$sql))>0){
$d=mysqli_fetch_array($r);
    $ty=$d['route_id'] ;
    $qs="select * from bus where route_id=$ty and date='$date' ";
    if(mysqli_num_rows($re=mysqli_query($con,$qs))>0){

   while($dd=mysqli_fetch_array($re)){
    // echo $dd['bus_name'];
?>
<div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-xl-8">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="destination-img">
                                                <img class="img-fluid rounded w-100" src="../img/<?php echo $dd['image'];?> " alt="">
                                                <div class="destination-overlay p-4">
                                                    <h4 class="text-white mb-2 mt-3"><?php echo $dd['bus_name'];?></h4>
                                                    <h4 class="text-white mb-2 mt-3"><?php echo $dd['start_time'];  if($dd['start_time']<12){
                                                        echo"AM";} else { echo"PM";}
                                                        ?></h4>
                                                    <a href="view_seat.php?b_id=<?php echo $dd['bus_id']?>&&busname=<?php echo $dd['bus_name']?>" class="btn-hover text-white">View Seat <i class="fa fa-arrow-right ms-2"></i></a>
                                                </div>
                                              
                                            </div>
                                        </div>
<?php
    }

}else{
    echo"<p> no date & route</p>";
}
}
    ?>


<?php

?>
<?php
include 'footer.php'
?>