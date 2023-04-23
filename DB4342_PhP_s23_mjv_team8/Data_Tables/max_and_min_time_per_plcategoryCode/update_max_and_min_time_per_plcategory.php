
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

if (isset($_POST['PLtype'])){

    $pltype = isset($_POST['PLtype']) ? $_POST['PLtype'] : " ";
    $min_clean_time = isset($_POST['min_clean_time']) ? $_POST['min_clean_time'] : " ";
    $max_clean_time = isset($_POST['max_clean_time']) ? $_POST['max_clean_time'] : " ";

    $query = "UPDATE MAX_AND_MIN_TIME_PER_PLCATEGORY SET PLmin_clean_time=$min_clean_time, PLmax_clean_time=$max_clean_time WHERE PLtype = '$pltype'";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_max_and_min_time_per_plcategory.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No student id received on request at update student";
  die();
}

?>
