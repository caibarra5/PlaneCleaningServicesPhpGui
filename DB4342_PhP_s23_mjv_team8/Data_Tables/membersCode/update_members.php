
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

if (isset($_POST['Tcode']) and isset($_POST['PEssn'])){

    $tcode = isset($_POST['Tcode']) ? $_POST['Tcode'] : " ";
    $pessn = isset($_POST['ssn']) ? $_POST['ssn'] : " ";

    $query = "UPDATE MEMBERS SET Tcode = $tcode , PEssn = '$pessn' WHERE (Tcode, PEssn) = ($tcode, '$pessn')";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_members.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No members code,ssn received on request at update members";
  die();
}

?>
