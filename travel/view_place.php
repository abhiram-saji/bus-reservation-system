<?php
include 'header.php'; // Including the header
include '../connection.php'; // Database connection

// Query to fetch all places
$sql = "SELECT * FROM place";
$result = mysqli_query($con, $sql);
?>
 <div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="min-height:50vh">
                <img src="img/road.jpg" height="150" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-2 text-capitalize text-white mb-4">Place DETAILS</h1>
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

<div class="container-fluid py-5">
    <div class="container">
        <h1 class="text-center mb-4">List of Places</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Place</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are any places to display
                if (mysqli_num_rows($result) > 0) {
                    // Loop through each place and display it in the table
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['place_id'] . "</td>";
                        echo "<td>" . $row['place'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2' class='text-center'>No places found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php
include 'footer.php'; // Including the footer
?>
