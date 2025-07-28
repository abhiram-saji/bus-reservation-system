<?php
session_start();
include 'header.php';

$r_id = $_GET['id'];
?>
<style>
    body {
        font-family: 'Arial', sans-serif;
        background: #f8f9fa; /* Light background for better contrast */
    }

    .site-blocks-cover {
        background: url('images/hero_1.jpg') no-repeat center center;
        background-size: cover;
        position: relative;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .site-blocks-cover:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.7); /* Dark overlay for better readability */
    }

    .form-container {
        background-color: #ffffff; /* White background for the form */
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 2; /* Bring the form above the overlay */
        width: 100%;
        max-width: 500px; /* Limit the width for better layout */
    }

    .form-container h2 {
        color: #333; /* Dark color for the heading */
        margin-bottom: 20px;
    }

    .form-group label {
        color: #555; /* Darker label color for better visibility */
        font-size: 16px; /* Clearer label font size */
    }

    .form-control {
        border-radius: 5px;
        border: 1px solid #ced4da; /* Default Bootstrap border */
        box-shadow: none; /* Remove default shadow */
    }

    .form-control:focus {
        border-color: #007bff; /* Change border color on focus */
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add subtle shadow on focus */
    }

    .btn-info {
        background-color: #007bff; /* Primary color for the button */
        border: none; /* Remove default border */
        border-radius: 5px; /* Rounded corners */
        padding: 10px 15px; /* Button padding */
        font-size: 16px; /* Button text size */
        transition: background-color 0.3s; /* Transition for hover effect */
    }

    .btn-info:hover {
        background-color: #0056b3; /* Darker shade on hover */
    }
</style>

<div class="site-blocks-cover">
    <div class="form-container">
        <h2 class="text-center">Add Feedback / Suggestions</h2>
        <form method="post" action="feedback_action.php?req_id=<?php echo $r_id; ?>">
            <div class="form-group">
                <label for="c_feedback">Feedback / Suggestions</label>
                <input type="text" class="form-control" id="c_feedback" placeholder="Enter your feedback" name="com" required>
            </div>
            
            <div class="form-group">
                <label for="c_rating">Select a Rating</label>
                <select class="form-control" id="c_rating" name="rate" required>
                    <option value="">Select a Rating</option>
                    <option value="⭐⭐⭐⭐⭐">5 *****</option>
                    <option value="⭐⭐⭐⭐">4 ****</option>
                    <option value="⭐⭐⭐">3 ***</option>
                    <option value="⭐⭐">2 **</option>
                    <option value="⭐">1 *</option>
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-info">Post Feedback</button>
            </div>
        </form>
    </div>
</div>

<?php
include 'footer.php';
?>
