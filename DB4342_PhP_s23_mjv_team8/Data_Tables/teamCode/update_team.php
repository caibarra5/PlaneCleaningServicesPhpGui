
<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 */
-->

<?php

// Accessing the information for the DB connection from the configuration file and validating that a user is logged in.
session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_POST['Tcode'])){

    $tcode = isset($_POST['Tcode']) ? $_POST['Tcode'] : " ";
    $tstatus = isset($_POST['status']) ? $_POST['status'] : " ";
    $supssn = isset($_POST['ssn']) ? $_POST['ssn'] : " ";
    $tairport_code = isset($_POST['airport_code']) ? $_POST['airport_code'] : " ";
    $tgate = isset($_POST['gate']) ? $_POST['gate'] : " ";

    $query = "UPDATE TEAM SET Tstatus='$tstatus', SUPssn='$supssn', Tairport_code=$tairport_code, Tgate='$tgate' WHERE Tcode = $tcode";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_team.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No team code received on request at update team";
  die();
}

?>
