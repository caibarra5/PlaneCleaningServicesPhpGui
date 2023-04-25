<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of this file is to create a new personnel member.
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * Modified by Vazquez
 */
-->
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Create Personnel</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Create Personnel</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="create_personnel.php" method="post">
        <div class="form-group">
                <label for="ssn">SSN</label>
                <input class="form-control" type="text" id="ssn" name="ssn">
            </div>
            <div class="form-group">
                <label for="fname">First Name</label>
                <input class="form-control" type="text" id="fname" name="fname">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input class="form-control" type="text" id="status" name="status">
            </div>
            <div class="form-group">
                <label for="byear">Birthyear</label>
                <input class="form-control" type="text" id="byear" name="byear">
            </div>
            <div class="form-group">
                <label for="bmonth">Birthmonth</label>
                <input class="form-control" type="text" id="bmonth" name="bmonth">
            </div>
            <div class="form-group">
                <label for="bday">Birthday</label>
                <input class="form-control" type="text" id="bday" name="bday">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input class="form-control" type="text" id="gender" name="gender">
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input class="form-control" type="text" id="salary" name="salary">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="personnel_menu.php">Back to Personnel Menu</a></br>
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
            $pessn = isset($_POST['ssn']) ? $_POST['ssn'] : " ";  
            $pefname = isset($_POST['fname']) ? $_POST['fname'] : " ";
            $pelname = isset($_POST['lname']) ? $_POST['lname'] : " ";
            $pestatus = isset($_POST['status']) ? $_POST['status'] : " ";
            $pebyear = isset($_POST['byear']) ? $_POST['byear'] : " ";
            $pebmonth = isset($_POST['bmonth']) ? $_POST['bmonth'] : " ";
            $pebday = isset($_POST['bday']) ? $_POST['bday'] : " ";
            $pegender = isset($_POST['gender']) ? $_POST['gender'] : " ";
            $pesalary = isset($_POST['salary']) ? $_POST['salary'] : " ";
            
            //Insert into Student table;
            
            $queryPersonnel  = "call add_personnel('".$pessn."', '".$pefname."', '".$pelname."', '".$pestatus."', '".$pebyear."', '".$pebmonth."', '".$pebday."', '".$pegender."', '".$pesalary."');";

            // The query sent to the DB can be printed by not commenting the following row
            //echo $queryStudent;
            if ($conn->query($queryPersonnel) === TRUE) {
            echo "<br> New record created successfully for personnel ssn ".$pessn;
            } else {
                echo "<br> The record was not created, the query: <br>" . $queryPersonnel . "  <br> Generated the error <br>" . $conn->error;
            }

            // To redirect the page to the student menu right after the query is executed, use the following statement 
            // header("Location: student_menu.php");
}
?>


</body>

</html>