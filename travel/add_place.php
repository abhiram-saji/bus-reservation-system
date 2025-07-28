<?php
include 'header.php'
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
                    <div class="col-lg-6"><br><br><br><br><br><br>
                        <h1 class="text-white mb-3">Add Place</h1>
                        <!-- <p class="text-white mb-4">Get <span class="text-warning">50% Off</span> On Your First Adventure Trip With Yathra. Get More Deal Offers Here.</p> -->
                        <form action="place_action.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control bg-white border-0" name="place" id="place" placeholder="place" required>
                                        <label for="place">Place</label>
                                    </div>
                                 </div>
                                <!--<div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control bg-white border-0" name="email" id="email" placeholder="Your Email" required>
                                        <label for="email">Your Email</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
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
                                    <button class="btn btn-primary text-white w-100 py-3" type="submit">Add Place</button>
                                </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<?php
include 'footer.php'
?>