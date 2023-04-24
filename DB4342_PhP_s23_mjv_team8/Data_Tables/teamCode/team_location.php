<!--
/**
 * CS 4342 Database Management
 * @author Instruction team with contribution from L. Garnica and K. Apodaca
 * @version 2.0
 * Description: The purpose of this file is to show a given team's location
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
    <title>Find Team Location</title>

    <!-- Importing Bootstrap CSS library https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div style="margin-top: 20px" class="container">
        <h1>Find teams in service</h1>
        <!-- styling of the form for bootstrap https://getbootstrap.com/docs/4.5/components/forms/ -->
        <form action="team_location.php" method="post">
        <div class="form-group">
                <label for="team_code">Team Code</label>
                <input class="form-control" type="text" id="team_code" name="team_code">
            </div>
            
            <div class="form-group">
                <input class="btn btn-primary" name='Submit' type="submit" value="Submit">
            </div>
        </form>
        <div>
            <br>
            <a href="team_menu.php">Back to Team Menu</a></br>
        </div>

        <!-- jQuery and JS bundle w/ Popper.js -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

    
    
    <?php
        session_start();
        require_once('../../config.php');
        require_once('../../validate_session.php');

        $sql = "SELECT Tcode, Tstatus FROM TEAM where Tstatus = 'in service'";
        if ($result = $conn->query($sql)) {
        ?>
            <table class="table" width=50%>
                <thead>
                    <td> Team Code</td>
                    <td> Team Status</td>
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
        ?>
<?php



        if (isset($_POST['Submit'])){

    
            /**
             * Grab information from the form submission and store values into variables.
             */
            $Tcode = isset($_POST['team_code']) ? $_POST['team_code'] : " ";  
            
            //Insert into Student table;
            
            $queryTeamLocation  = "SELECT P.PLcode, P.PLgate, P.PLairport_code, P.SERdate
            FROM plane AS P 
            INNER JOIN team AS T 
            ON P.PLcode = T.Tcode 
            WHERE T.Tstatus = 'in service' AND T.Tcode = $Tcode;
            ";

            if ($result = $conn->query($queryTeamLocation)) { 
                ?>
                        <table class="table" width=50%>
            <thead>
                <td> Plane Code</td>
                <td> Gate</td>
                <td> Airport Code </td>
                <td> Date </td>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_row()) {
                ?>
                    <tr>
                    <td><?php printf("%s", $row[0]); ?></td>
                        <td><?php printf("%s", $row[1]); ?></td>
                        <td><?php printf("%s", $row[2]); ?></td>
                        <td><?php printf("%s", $row[3]); ?></td>
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