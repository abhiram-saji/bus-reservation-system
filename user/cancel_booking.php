<?php
// Start the session
session_start();

// Include your database connection file
include '../connection.php';


    $booking_id = $_POST['booking_id'];
echo $booking_id;
    // Prepare the DELETE query to remove the booking from the database
    $sql = "update  book set status ='cancel'  where book_id=$booking_id ";
    mysqli_query($con,$sql);
   
            // Redirect the user to the booking history page or a confirmation page
            echo "<script>alert('Your booking has been canceled successfully.');window.location='view_booking.php'</script>";
         
    
?>