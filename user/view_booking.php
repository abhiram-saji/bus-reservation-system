<?php
session_start();
$log = $_SESSION['login_id'];

include 'header.php';
include '../connection.php';
?>

<style>
    /* Carousel Styling */
    .carousel-header {
        margin-top: 20px;
    }
    .carousel-inner img {
        max-height: 600px;
        object-fit: cover;
    }
    .carousel-caption {
        background: rgba(0, 0, 0, 0.6);
        padding: 20px;
        border-radius: 10px;
    }
    .carousel-caption p {
        font-size: 1.2rem;
    }
    .btn-primary {
        background-color: #007bff;
        border: none;
        transition: background-color 0.3s ease;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    /* Carousel Control Styling */
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-color: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        padding: 10px;
        transition: background-color 0.3s ease;
    }
    .carousel-control-prev-icon:hover, .carousel-control-next-icon:hover {
        background-color: rgba(0, 0, 0, 0.5);
    }
    .fas {
        color: #fff;
        transition: color 0.3s ease;
    }
    .fas:hover {
        color: #ddd;
    }
    .container{
        margin-top:-100px;
    }
</style>

<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="min-height:50vh">
                <img src="img/road.jpg" height="300" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-2 text-capitalize text-white mb-4">Booking DETAILS</h1>
                </div>
            </div>
        </div>
       
    </div>
</div>

<?php
// Active Bookings Query
$str = "SELECT * FROM book, register, bus WHERE book.userId=register.login_id AND bus.bus_id=book.b_id AND book.userId=$log and book.status!='cancel'";
if (mysqli_num_rows($result = mysqli_query($con, $str)) > 0) {
?>
    <div class="container mt-5" style="margin-top:-100">
        <!-- Heading for Active Bookings Table -->
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
                        <th scope="col">Feedback</th>
                        <th scope="col">Cancel</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr style="border: 2px solid black;">
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['bus_name']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['bookedseats']; ?></td>
                        <td><?php echo $data['start_time']; ?></td>
                        <td>
                            <?php 
                            $b = $data['book_id'];
                            $select = "SELECT * FROM feedback WHERE book_id=$b AND cust_id=$log";
                            if (mysqli_num_rows(mysqli_query($con, $select)) > 0) {
                                echo "<p>Feedback already added</p>";
                            } else {
                            ?>
                                <a href="feedback.php?id=<?php echo $b ?>" style="color:red;" class="btn btn-info">Give Feedback</a>
                        </td>
                        <td>
                        <?php $currentdate = date('Y-m-d');
                        if($data['date'] > $currentdate) { ?>
                            <form action="cancel_booking.php" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                <input type="hidden" name="booking_id" value="<?php echo $data['book_id']; ?>">
                                <button type="submit" class="btn btn-danger">Cancel</button>
                            </form>
                        </td>
                        <?php }} ?>
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
    <h2 class="text-center">No active bookings found</h2>
<?php
}

// Canceled Bookings Query
$str = "SELECT * FROM book, register, bus WHERE book.userId=register.login_id AND bus.bus_id=book.b_id AND book.userId=$log and book.status='cancel'";
if (mysqli_num_rows($result = mysqli_query($con, $str)) > 0) {
?>
    <div class="container mt-5">
        <!-- Heading for Canceled Bookings Table -->
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
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr style="border: 2px solid black;">
                        <td><?php echo $data['name']; ?></td>
                        <td><?php echo $data['bus_name']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['bookedseats']; ?></td>
                        <td><?php echo $data['start_time']; ?></td>
                        <td>Cancelled</td>
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
    <h2 class="text-center">No canceled bookings found</h2>
<?php
}

include 'footer.php';
?>
