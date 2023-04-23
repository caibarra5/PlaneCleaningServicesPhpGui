<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file provides an example of how to separate the interface for the user , e.g., PhP from from the program logic, e.g., PhP statements.
 */
-->


<?php
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_GET['PEssn'])) {
    $pessn = $_GET['PEssn'];
    $sql = "SELECT * FROM PERSONNEL where PEssn = '$pessn'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_array($result);
}
else {
    echo "No personnel ssn received on request at update_personnel_interface get";
    die();
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CS4342 Personnel Update</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Update Personnel</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <!-- Displaying a form with the information of the user so values can be modified 
             Note that the ID is not shown to be modified, only other attributes. -->

        <form action="update_personnel.php" method="post">
            <input type="hidden" name="PEssn" id="PEssn" value="<?php echo $row['PEssn'] ?>">
            <div class="form-group">
                <label for="fname">First Name</label>
                <input class="form-control" type="text" id="fname" name="fname" value="<?php echo $row['PEfname'] ?>">
            </div>
            <div class="form-group">
                <label for="lname">Last Name</label>
                <input class="form-control" type="text" id="lname" name="lname" value="<?php echo $row['PElname'] ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <input class="form-control" type="text" id="status" name="status" value="<?php echo $row['PEstatus'] ?>">
            </div>
            <div class="form-group">
                <label for="byear">Birthyear</label>
                <input class="form-control" type="text" id="byear" name="byear" value="<?php echo $row['PEbyear'] ?>">
            </div>
            <div class="form-group">
                <label for="bmonth">Birthmonth</label>
                <input class="form-control" type="text" id="bmonth" name="bmonth" value="<?php echo $row['PEbmonth'] ?>">
            </div>
            <div class="form-group">
                <label for="bday">Birthday</label>
                <input class="form-control" type="text" id="bday" name="bday" value="<?php echo $row['PEbday'] ?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input class="form-control" type="text" id="gender" name="gender" value="<?php echo $row['PEgender'] ?>">
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input class="form-control" type="text" id="salary" name="salary" value="<?php echo $row['PEsalary'] ?>">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Update">
            </div>
        </form>
        <div>
            <br>
            <a href="personnel_menu.php">Back to Personnel Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>