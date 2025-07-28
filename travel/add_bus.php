<?php
include 'header.php'
?>
 <div class="container-fluid booking py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <h5 class="section-booking-title pe-3">Booking</h5>
                        <h1 class="text-white mb-4">Online Booking</h1><br><br><br><br><br><br>
                        <!-- <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                        </p>
                        <p class="text-white mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur maxime ullam esse fuga blanditiis accusantium pariatur quis sapiente, veniam doloribus praesentium? Repudiandae iste voluptatem fugiat doloribus quasi quo iure officia.
                        </p> -->
                        <!-- <a href="#" class="btn btn-light text-primary rounded-pill py-3 px-5 mt-2">Read More</a> -->
                    </div>
                    <div class="col-lg-6">
                        <h1 class="text-white mb-3">Add Bus</h1>
                        <!-- <p class="text-white mb-4">Get <span class="text-warning">50% Off</span> On Your First Adventure Trip With Yathra. Get More Deal Offers Here.</p> -->
                        <form action="bus_action.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" name="bus_name" id="bus_name" placeholder="Bus Name" required>
                                        <label for="bus_name">Bus Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="time" class="form-control bg-white border-0" name="start_time" id="start_time" placeholder="Start Time" required>
                                        <label for="start_time">Start Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="time" class="form-control bg-white border-0" name="arrival_time" id="arrival_time" placeholder="Arrival Time" required>
                                        <label for="arrival_time">Arrival Time</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="date" class="form-control bg-white border-0" name="date" id="date" placeholder="Date" required>
                                        <label for="date">Date</label>
                                    </div>
                                </div>
                               
                                
                                <div class="col-md-6">
                                <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" name="vehicle_number" id="vehicle_number" placeholder="Vehicle Number" required>
                                        <label for="vehicle_number">Vehicle Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" class="form-control bg-white border-0" name="image" id="image" placeholder="image" required>
                                        <label for="image">Image</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="file" class="form-control bg-white border-0" name="seat_image" id="seat_image" placeholder="seat_image" required>
                                        <label for="seat_image">Seat Image</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-floating">
                                <select name="route" class="form-control bg-white border-0" id="route" placeholder="route" required>
                                        <option>Select Route</option>
                                        <?php
                                    include '../connection.php';
$sql="select*from route";
$rs=mysqli_query($con,$sql);
$count=mysqli_num_rows($rs);
if (mysqli_num_rows($rs)>0){


while($data=mysqli_fetch_array($rs)){
    echo "<option value=".$data['route_id'].">".$data['start']." to ".$data ['destiny']."</option>";
}
}
?>
</Select>
</div>
</div>
                                <div class="col-12">
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit">Add Bus</button>
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