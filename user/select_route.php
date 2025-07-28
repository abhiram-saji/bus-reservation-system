<?php
include 'header.php';
include '../connection.php';
$sql="select*from place";
$rs=mysqli_query($con,$sql);
$data=mysqli_fetch_array($rs);
?>
 <div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h5 class="section-booking-title pe-3">Booking</h5>
                        <h1 class="text-white mb-4">Online Booking</h1>
                        <!-- <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                        </p>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                        </p> -->
                        <!-- <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a> -->
                    </div>
                    
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Select Route</h1>
                        <!-- <p class="text-white mb-4">Get <span class="text-warning">50% Off</span> On Your First Adventure Trip With Yathra. Get More Deal Offers Here.</p> -->
                        <form action="route_action.php" method="POST">
                        <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-white border-0" name="date" id="date" placeholder="Date" min="<?php echo date('Y-m-d');?>" required>
                                        <label for="date">Date</label>
                                    </div>
                                </div><br><br>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <select name="start" class="form-control bg-white border-0" id="start" placeholder="start" required>
                                        <option>Select Starting Point</option>
                                        <?php
                                    include '../connection.php';
$sql="select*from place";
$rs=mysqli_query($con,$sql);
$count=mysqli_num_rows($rs);
if (mysqli_num_rows($rs)>0){


while($data=mysqli_fetch_array($rs)){
    echo "<option>".$data['place']."</option>";
}
}
?>
  <!-- <option value="<?php echo $data['place']; ?>"></option>
  <option value="kochi">Kochi</option>
  <option value="Aluva">Aluva</option>
  <option value="perumbavoor">perumbavoor</option> -->
</select>
                                    </div>
                                 </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                    <select name="destiny" class="form-control bg-white border-0" id="destiny" placeholder="destiny" required>
                                      <option>Select Destination</option> 
                                    <?php
                                    include '../connection.php';
$sql="select*from place";
$rs=mysqli_query($con,$sql);
$count=mysqli_num_rows($rs);
if (mysqli_num_rows($rs)>0){


while($data=mysqli_fetch_array($rs)){
    echo "<option>".$data['place']."</option>";
}
}
?>
  <!-- <option value="<?php echo $data['place']; ?>">Edapally</option>
  <option value="kochi"></option>
  <option value="saab"></option>
  <option value="mercedes"></option>
  <option value="perumbavoori">perumbavoor</option> -->
</select>
                                    </div>
                                 </div>
                                <!--<div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="phone" class="form-control bg-white border-0" name="phone" id="phone" placeholder="Your Phone" required>
                                        <label for="phone">Your Phone</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control bg-white border-0"name="address" placeholder="address" id="adress" style="height: 100px" required></textarea>
                                        <label for="address">Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" name="username" id="username" placeholder="User Name" required>
                                        <label for="username">username</label>
                                    </div>
</div> -->
<!-- <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control bg-white border-0" name="pass" id="pass" placeholder="Password" required>
                                        <label for="pass">Password</label>
                                    </div>
</div> -->
                                <div class="col-12">
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
include 'footer.php'
?>