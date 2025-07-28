<?php
session_start();
include 'header.php';
include '../connection.php';
?>
<div class="carousel-header" >
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <!-- <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol> -->
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active" >
                            <img src="img/road.jpg" height="150" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <!-- <div class="p-3" style="max-width: 600px;"> -->
                                    <!-- <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World</h4> -->
                                    <h1 class="display-2 text-capitalize text-white mb-4">USER DETAILS</h1>
                                    <!-- <p class="mb-5 fs-5">Welcome to YATHRA! Your go-to destination for hassle-free bus reservations. Easily search for routes, compare prices, and book your tickets online. Enjoy a seamless travel experience with real-time updates and a range of options to suit your needs. Start planning your next journey with us today!
                                    </p> -->
                                    <!-- <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div> -->
                                <!-- </div> -->
                            </div>
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="img/bus.jpg" size="200"  class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Find Your Perfect Tour At Travel</h1>
                                    <p class="mb-5 fs-5">Welcome to YATHRA! Your go-to destination for hassle-free bus reservations. Easily search for routes, compare prices, and book your tickets online. Enjoy a seamless travel experience with real-time updates and a range of options to suit your needs. Start planning your next journey with us today!
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/kochi.jpg" size="200"  class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">You Like To Go?</h1>
                                    <p class="mb-5 fs-5">Welcome to YATHRA! Your go-to destination for hassle-free bus reservations. Easily search for routes, compare prices, and book your tickets online. Enjoy a seamless travel experience with real-time updates and a range of options to suit your needs. Start planning your next journey with us today!
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Carousel End -->
        </div>
<?php

$str="select * from register,login where login.login_id=register.login_id ";
if(mysqli_num_rows($result=mysqli_query($con,$str))>0){
?>
<table class="table">
  <thead>
    <tr>
      
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Address</th>
    
    </tr>
  </thead>
  <tbody>
<?php
while($data=mysqli_fetch_array($result)){
    ?>

 <tr>
      
      <td><?php echo $data['name']?></td>
      <td><?php echo $data['email']?></td>
      <td><?php echo $data['phone']?></td>
      <td><?php echo $data['address']?></td>
      <?php
      if($data['user_status']=='approved'){
        ?>
        <td>approved</td>
        <td><a href="reject.php?t_id=<?php echo $data['login_id']?>" class="btn btn-info" >reject</a></td>
        <?php
      }elseif($data['user_status']=='0'){
      ?>
     <td><a href="approvel.php?t_id=<?php echo $data['login_id']?>" class="btn btn-info" >approvel</a></td>
     <td><a href="reject.php?t_id=<?php echo $data['login_id']?>" class="btn btn-info" >reject</a></td>
     <?php
      }elseif($data['user_status']=='cancel'){
     ?>
         <td>rejected</td>
         <td><a href="approvel.php?t_id=<?php echo $data['login_id']?>" class="btn btn-info" >approvel</a></td>
         <?php
      }
      ?>
    </tr>
   <?php
}
   ?>
  </tbody>
</table>
<?php
}else{
?>
<h2>user not found </h2>
<?php
}
?>
<?php
include 'footer.php'
?>
