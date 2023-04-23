<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file inserts a new record  into the table Student of your DB.
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create Max_and_min_time_per_plcategory</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Max_and_min_time_per_plcategory</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_max_and_min_time_per_plcategory.php" method="post">
        <div class="form-group">
                <label for="type">Type</label>
                <input class="form-control" type="text" id="type" name="type">
            </div>
            <div class="form-group">
                <label for="min_clean_time">Min Clean Time</label>
                <input class="form-control" type="text" id="min_clean_time" name="min_clean_time">
            </div>
            <div class="form-group">
                <label for="max_clean_time">Max Clean Time</label>
                <input class="form-control" type="text" id="max_clean_time" name="max_clean_time">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="max_and_min_time_per_plcategory_menu.php">Back to Max_and_min_time_per_plcategory Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    
    
    <?php
        session_start();
        require_once('../../config.php');
        require_once('../../validate_session.php');
        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */
            $pltype = isset($_POST['type']) ? $_POST['type'] : " ";  
            $plmin_clean_time = isset($_POST['min_clean_time']) ? $_POST['min_clean_time'] : " ";
            $plmax_clean_time = isset($_POST['max_clean_time']) ? $_POST['max_clean_time'] : " ";
            
            //Insert into Student table;
            
            $queryMax_and_min_time_per_plcategory  = "INSERT INTO MAX_AND_MIN_TIME_PER_PLCATEGORY (PLtype,PLmin_clean_time,PLmax_clean_time)
                        VALUES ('".$pltype."', '".$plmin_clean_time."', '".$plmax_clean_time."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryMax_and_min_time_per_plcategory) === TRUE) {
            echo "<br> New record created successfully for student id ".$pltype;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryMax_and_min_time_per_plcategory . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>