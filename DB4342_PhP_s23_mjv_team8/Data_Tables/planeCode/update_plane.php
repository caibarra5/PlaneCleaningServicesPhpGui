
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

if (isset($_POST['PLcode'])){

    $plcode = isset($_POST['PLcode']) ? $_POST['PLcode'] : " ";
    $pltype = isset($_POST['type']) ? $_POST['type'] : " ";
    $plgate = isset($_POST['gate']) ? $_POST['gate'] : " ";
    $plairport_code = isset($_POST['airport_code']) ? $_POST['airport_code'] : " ";
    $serservice_number = isset($_POST['service_number']) ? $_POST['service_number'] : " ";
    $serduration = isset($_POST['duration']) ? $_POST['duration'] : " ";
    $serdate = isset($_POST['date']) ? $_POST['date'] : " ";
    $tcode = isset($_POST['code']) ? $_POST['code'] : " ";

    $query = "UPDATE PLANE SET PLtype='$pltype', PLgate='$plgate', PLairport_code='$plairport_code', SERservice_number=$serservice_number, SERduration=$serduration, SERdate='$serdate', Tcode=$tcode WHERE PLcode = $plcode";
    echo $query;

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        header("Location: view_plane.php");
      } else {
        echo "Error updating record: " . mysqli_error($conn);
      }

}
else {
  echo "No plane code received on request at update plane";
  die();
}

?>
