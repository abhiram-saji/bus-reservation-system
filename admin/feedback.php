<?php
session_start();
$log = $_SESSION['login_id'];
include 'header.php';
include '../connection.php';

// Correct SQL query to join tables properly
$sql = "
    SELECT *,register.name as r_name,register.email as r_email
    FROM feedback,book,register,bus,travel where feedback.book_id = book.book_id and register.login_id=book.userId and bus.bus_id=book.b_id and travel.login_id=bus.login_id";

// Execute the query
$result = mysqli_query($con, $sql);

// Check if the query was successful
if (!$result) {
    die("Query Failed: " . mysqli_error($con));
}

?>

<div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="min-height: 50vh;">
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

<div id="page-inner"></div>

<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="index.php">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Feedback</strong>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <h1 class="text-center mb-4">Feedback</h1>

            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="info">Customer Name</th>
                        <th class="info">Customer Name</th>
                        <th class="info">Travel Name</th>
                        <th class="info">Travel Email</th>
                        <th class="info">Rating</th>
                        <th class="info">Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($data = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($data['r_name']); ?></td>
                                <td><?php echo htmlspecialchars($data['r_email']); ?></td>
                                <td><?php echo htmlspecialchars($data['name']); ?></td>
                                <td><?php echo htmlspecialchars($data['email']); ?></td>
                                <td><?php echo htmlspecialchars($data['rate']); ?></td>
                                <td><?php echo htmlspecialchars($data['comment']); ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="4" class="text-center">Currently no feedback found!</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 text-center">
                <div class="site-block-27"></div>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
