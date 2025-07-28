<?php
session_start();
$log = $_SESSION['login_id'];

include 'header.php';
include '../connection.php';
?>
<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="min-height:50vh">
                <img src="img/road.jpg" height="150" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-2 text-capitalize text-white mb-4">Booking DETAILS</h1>
                </div>
            </div>
        </div>
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

<?php
// Query for active bookings
$str = "SELECT *,register.name as r_name FROM book, register, bus, travel WHERE travel.login_id=bus.login_id AND travel.login_id=$log AND book.userId=register.login_id AND bus.bus_id=book.b_id AND book.status!='cancel'";
if (mysqli_num_rows($result = mysqli_query($con, $str)) > 0) {
?>
    <div class="container mt-5">
        <!-- Heading for Active Bookings -->
        <h2 class="text-center mb-4">Active Bookings</h2>

        <div class="d-flex justify-content-center">
            <table class="table table-bordered text-center w-75" style="border: 2px solid black;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Bus Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Seat No</th>
                        <th scope="col">Start Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr style="border: 2px solid black;">
                        <td><?php echo $data['r_name']; ?></td>
                        <td><?php echo $data['bus_name']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['bookedseats']; ?></td>
                        <td><?php echo $data['start_time']; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
} else {
?>
    <h2 class="text-center">No Active Bookings Found</h2>
<?php
}

// Query for canceled bookings
$str = "SELECT *,register.name as r_name FROM book, register, bus, travel WHERE travel.login_id=bus.login_id AND travel.login_id=$log AND book.userId=register.login_id AND bus.bus_id=book.b_id AND book.status='cancel'";
if (mysqli_num_rows($result = mysqli_query($con, $str)) > 0) {
?>
    <div class="container mt-5">
        <!-- Heading for Canceled Bookings -->
        <h2 class="text-center mb-4">Canceled Bookings</h2>

        <div class="d-flex justify-content-center">
            <table class="table table-bordered text-center w-75" style="border: 2px solid black;">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Bus Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Seat No</th>
                        <th scope="col">Start Time</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr style="border: 2px solid black;">
                        <td><?php echo $data['r_name']; ?></td>
                        <td><?php echo $data['bus_name']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['bookedseats']; ?></td>
                        <td><?php echo $data['start_time']; ?></td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
} else {
?>
    <h2 class="text-center">No Canceled Bookings Found</h2>
<?php
}

include 'footer.php';
?>
