
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

if (isset($_POST['PEssn'])){

    $pessn = isset($_POST['PEssn']) ? $_POST['PEssn'] : " ";
    $pephone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : " ";

    $query = "UPDATE PERSON_PHONE_NUMBER SET PEphone_number='$pephone_number' WHERE PEssn = '$pessn'";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_person_phone_number.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No person_phone_number ssn received on request at update person_phone_number";
  die();
}

?>
