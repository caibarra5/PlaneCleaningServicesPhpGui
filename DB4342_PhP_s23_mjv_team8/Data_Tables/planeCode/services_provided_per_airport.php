<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of this file is to tell the user what group cleaned a given plane, as well as where and when it happened.
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
    <title>Services by airport code</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Services by airport code:</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="services_provided_per_airport.php" method="post">
        <div class="form-group">
                <label for="airport_code">Please Enter airport code:</label>
                <input class="form-control" type="text" id="airport_code" name="airport_code">
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
            $airport_code = isset($_POST['airport_code']) ? $_POST['airport_code'] : " ";  
        
            //Insert into Student table;
            
            $queryPlaneCleaned  = "SELECT * FROM service_airport WHERE PLairport_code=$airport_code;";

            if ($result = $conn->query($queryPlaneCleaned)) { 
                ?>
                        <table class="table" width=50%>
            <thead>
                <td> Plane Code</td>
                <td> Service Code </td>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_row()) {
                ?>
                    <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                    <td><?php printf("%s", $row[1]); ?></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <?php
            } 
}
?>


</body>

</html>