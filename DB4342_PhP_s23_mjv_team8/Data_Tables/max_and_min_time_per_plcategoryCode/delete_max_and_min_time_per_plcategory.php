<!--
/**
 * CS 4342 Database Management
 * @author Instruction team Spring and Fall 2020 with contribution from L. Garnica
 * @version 2.0
 * Description: The purpose of these file is to provide PhP basic elements for an interface to access a DB. 
 * Resources: https://getbootstrap.com/docs/4.5/components/alerts/  -- bootstrap examples
 *
 * This file deletes a record  from the table Student of your DB.
 */
-->


<?php 

session_start();
require_once('../../config.php');
require_once('../../validate_session.php');

if (isset($_GET['PLtype'])){

    $pltype = $_GET['PLtype'];
    $query = "DELETE from MAX_AND_MIN_TIME_PER_PLCATEGORY where PLtype = '$pltype'";

    if ($conn->query($query) === TRUE) {
        echo "Max_and_min_time_per_plcategory deleted successfuly";
        header("Location: view_max_and_min_time_per_plcategory.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No PLtype received";
    header("Location: view_max_and_min_time_per_plcategory.php");
}

?>