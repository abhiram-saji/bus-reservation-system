<?php
session_start();
include '../connection.php';  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus List</title>
    <link rel="stylesheet" href="path/to/your/css/bootstrap.min.css"> <!-- Adjust the path to your Bootstrap CSS -->
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="carousel-header">
    <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active" style="min-height:50vh">
                <img src="img/road.jpg" height="150" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <h1 class="display-2 text-capitalize text-white mb-4">Bus DETAILS</h1>
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
    <div class="container my-5">
        <h1 class="text-center mb-4">List of Buses</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Bus Name</th>
                        <th>Start Time</th>
                        <th>Arrival Time</th>
                        <th>Date</th>
                        <th>Vehicle Number</th>
                        <th>Image</th>
                        <th>Seat Image</th>
                        <th>Route</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT bus.bus_name, bus.start_time, bus.arrival_time, bus.date, bus.vehicle_number, 
                                   bus.image, bus.seat_image, route.start, route.destiny 
                            FROM bus 
                            INNER JOIN route ON bus.route_id = route.route_id";
                    $result = mysqli_query($con, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['bus_name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['start_time']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['arrival_time']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['vehicle_number']) . "</td>";
                            echo "<td><img src='../img/" . htmlspecialchars($row['image']) . "' alt='Bus Image' width='100'></td>";
                            echo "<td><img src='../img/" . htmlspecialchars($row['seat_image']) . "' alt='Seat Image' width='100'></td>";
                            echo "<td>" . htmlspecialchars($row['start']) . " to " . htmlspecialchars($row['destiny']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='text-center'>No buses found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="path/to/your/js/bootstrap.bundle.min.js"></script> <!-- Adjust the path to your Bootstrap JS -->
</body>
</html>
