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

if (isset($_GET['Tcode'])){

    $tcode = $_GET['Tcode'];
    $query = "DELETE from Team where Tcode = $tcode";

    if ($conn->query($query) === TRUE) {
        echo "Team deleted successfuly";
        header("Location: view_team.php");
     } else {
         echo "Error: " . $query . "<br>" . $conn->error;
     }
} else{
    echo "No Tcode received";
    header("Location: view_team.php");
}

?>