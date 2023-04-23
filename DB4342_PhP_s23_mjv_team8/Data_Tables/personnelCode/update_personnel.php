
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
    $pefname = isset($_POST['fname']) ? $_POST['fname'] : " ";
    $pelname = isset($_POST['lname']) ? $_POST['lname'] : " ";
    $pestatus = isset($_POST['status']) ? $_POST['status'] : " ";
    $pebyear = isset($_POST['byear']) ? $_POST['byear'] : " ";
    $pebmonth = isset($_POST['bmonth']) ? $_POST['bmonth'] : " ";
    $pebday = isset($_POST['bday']) ? $_POST['bday'] : " ";
    $pegender = isset($_POST['gender']) ? $_POST['gender'] : " ";
    $pesalary = isset($_POST['salary']) ? $_POST['salary'] : " ";

    $query = "UPDATE PERSONNEL SET PEfname='$pefname', PElname='$pelname', PEstatus='$pestatus', PEbyear=$pebyear, PEbmonth=$pebmonth, PEbday=$pebday, PEgender='$pegender', PEsalary=$pesalary WHERE PEssn = '$pessn'";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_personnel.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No personnel ssn received on request at update personnel";
  die();
}

?>
