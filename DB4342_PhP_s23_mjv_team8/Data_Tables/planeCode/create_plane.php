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
    <title>CS4342 Create Plane</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Plane</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_plane.php" method="post">
        <div class="form-group">
                <label for="plane_code">Plane Code</label>
                <input class="form-control" type="text" id="plane_code" name="plane_code">
            </div>
            <div class="form-group">
                <label for="type">Type</label>
                <input class="form-control" type="text" id="type" name="type">
            </div>
            <div class="form-group">
                <label for="gate">Gate</label>
                <input class="form-control" type="text" id="gate" name="gate">
            </div>
            <div class="form-group">
                <label for="airport_code">Airport Code</label>
                <input class="form-control" type="text" id="airport_code" name="airport_code">
            </div>
            <div class="form-group">
                <label for="service_number">Service Number</label>
                <input class="form-control" type="text" id="service_number" name="service_number">
            </div>
            <div class="form-group">
                <label for="duration">Duration</label>
                <input class="form-control" type="text" id="duration" name="duration">
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input class="form-control" type="text" id="date" name="date">
            </div>
            <div class="form-group">
                <label for="code">Team Code</label>
                <input class="form-control" type="text" id="code" name="code">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="plane_menu.php">Back to Plane Menu</a></br>
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
            $plcode = isset($_POST['plane_code']) ? $_POST['plane_code'] : " ";  
            $pltype = isset($_POST['type']) ? $_POST['type'] : " ";
            $plgate = isset($_POST['gate']) ? $_POST['gate'] : " ";
            $plairport_code = isset($_POST['airport_code']) ? $_POST['airport_code'] : " ";
            $serservice_number = isset($_POST['service_number']) ? $_POST['service_number'] : " ";  
            $serduration = isset($_POST['duration']) ? $_POST['duration'] : " ";  
            $serdate = isset($_POST['date']) ? $_POST['date'] : " ";  
            $tcode = isset($_POST['code']) ? $_POST['code'] : " ";  
            
            //Insert into Student table;
            
            $queryPlane  = "INSERT INTO PLANE (PLcode, PLtype, PLgate, PLairport_code, SERservice_number, SERduration, SERdate, Tcode)
                        VALUES ('".$plcode."', '".$pltype."', '".$plgate."', '".$plairport_code."', '".$serservice_number."', '".$serduration."', '".$serdate."', '".$tcode."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryPlane) === TRUE) {
            echo "<br> New record created successfully for plane code ".$plcode;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryPlane . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>