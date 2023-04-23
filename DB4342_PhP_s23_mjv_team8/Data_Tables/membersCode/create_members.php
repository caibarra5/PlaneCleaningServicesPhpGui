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
    <title>CS4342 Create Members</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Members</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_members.php" method="post">
        <div class="form-group">
                <label for="code">CODE</label>
                <input class="form-control" type="text" id="code" name="code">
            </div>
            <div class="form-group">
                <label for="ssn">SSN</label>
                <input class="form-control" type="text" id="ssn" name="ssn">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="members_menu.php">Back to Members Menu</a></br>
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
            $tcode = isset($_POST['code']) ? $_POST['code'] : " ";  
            $pessn = isset($_POST['ssn']) ? $_POST['ssn'] : " ";
            
            //Insert into Student table;
            
            $queryMembers  = "INSERT INTO MEMBERS (Tcode,PEssn)
                        VALUES ('".$tcode."', '".$pessn."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryMembers) === TRUE) {
            echo "<br> New record created successfully for members code,ssn ".$tcode;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryMembers . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>