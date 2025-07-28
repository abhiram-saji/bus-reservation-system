<?php
session_start();
include '../connection.php';
if (!isset($_SESSION['login_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['login_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bus Booking</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style1.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery.seat-charts.js"></script>
</head>
<body>
<div class="wrap">
    <div class="header">
        <div class="clear"></div>
    </div>

    <?php
    $b_id = $_GET['b_id'];
    $busname = $_GET['busname'];
    $sql = "SELECT * FROM bus WHERE bus_id = '$b_id'";
    $res = mysqli_query($con, $sql);
    $res1 = mysqli_fetch_assoc($res);
    $price = $res1['price']; // Fetch seat price from the database
    ?>

    <div class="content">
        <h1><a href="buses.php">Buses</a></h1>
        <h1>Bus Ticket Booking</h1>
        <div class="main">
            <div class="demo">
                <div id="seat-map">
                    <div class="front">DRIVER</div>
                </div>
                <div class="booking-details">
                    <ul class="book-left">
                        <li>Bus Name</li>
                        <li>Date</li>
                        <li>Tickets</li>
                        <li>Total</li>
                        <li>Seats :</li>
                    </ul>
                    <ul class="book-right">
                        <li>: <?php echo htmlspecialchars($busname); ?></li>
                        <li>: <?php echo date("d/m/Y"); ?></li>
                        <li>: <span id="counter">0</span></li>
                        <li>: <b><span id="total">0</span></b></li>
                    </ul>
                    <div class="clear"></div>
                    <ul id="selected-seats" class="scrollbar scrollbar1"></ul>
                    <button class="checkout-button" onclick="bookNow();">Book Now</button>
                    <div id="legend"></div>
                </div>
                <div style="clear:both"></div>
            </div>

            <script type="text/javascript">
    var seats = '';
    var seatPrice = <?php echo json_encode($price); ?>; // Pass price to JavaScript safely

    <?php
    $bookedSeats = [];
    $seatQuery = "SELECT bookedseats FROM book WHERE b_id = '$b_id'";
    $seatResult = mysqli_query($con, $seatQuery);
    while ($row = mysqli_fetch_assoc($seatResult)) {
        $bookedSeats[] = $row['bookedseats'];
    }
    $bookedSeatsList = implode(',', $bookedSeats);
    ?>
    var bookedSeats = '<?php echo $bookedSeatsList; ?>';

    function remove(array, element) {
        const index = array.indexOf(element);
        if (index !== -1) array.splice(index, 1);
    }

    function bookNow() {
        if (seats === '') {
            alert('Please select at least one seat.');
        } else {
            alert('Seats Booked: ' + seats);
            window.location.href = "bookseats.php?b_id=<?php echo $b_id; ?>&seats=" + seats;
        }
    }

    $(document).ready(function() {
        var $cart = $('#selected-seats'),
            $counter = $('#counter'),
            $total = $('#total');

        var sc = $('#seat-map').seatCharts({
            map: [
                'aa__aa', 'aa__aa', 'aa__aa', 'aa__aa',
                'aa__aa', 'aa__aa', 'aa__aa', 'aa__aa',
                'aa__aa', 'aa__aa'
            ],
            naming: {
                top: false,
                getLabel: function (character, row, column) {
                    return column;
                }
            },
            legend: {
                node: $('#legend'),
                items: [
                    ['a', 'available', 'Available'],
                    ['a', 'unavailable', 'Booked'],
                    ['a', 'selected', 'Selected']
                ]
            },
            click: function() {
                if (this.status() === 'available') {
                    // Add seat to the selection
                    seats = seats === ""
                        ? [this.settings.row + 1, this.settings.label].join('_')
                        : [seats, [this.settings.row + 1, this.settings.label].join('_')].join(',');

                    $('<li>Row ' + (this.settings.row + 1) + ' Seat ' + this.settings.label + '</li>')
                        .attr('id', 'cart-item-' + this.settings.id)
                        .data('seatId', this.settings.id)
                        .appendTo($cart);

                    // Update seat counter and total price
                    $counter.text(sc.find('selected').length + 1);
                    $total.text((sc.find('selected').length + 1) * seatPrice);

                    return 'selected';
                } else if (this.status() === 'selected') {
                    // Remove seat from the selection
                    var a = seats.split(",");
                    var seatLabel = [this.settings.row + 1, this.settings.label].join('_');
                    remove(a, seatLabel);
                    seats = a.join(',');

                    // Update seat counter and total price
                    $counter.text(sc.find('selected').length - 1);
                    $total.text((sc.find('selected').length - 1) * seatPrice);

                    $('#cart-item-' + this.settings.id).remove();

                    return 'available';
                } else if (this.status() === 'unavailable') {
                    return 'unavailable';
                } else {
                    return this.style();
                }
            }
        });

        // Mark booked seats as unavailable
        if (bookedSeats) {
            sc.get(bookedSeats.split(",")).status('unavailable');
        }
    });
</script>

        </div>
    </div>
</div>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
</body>
</html>
