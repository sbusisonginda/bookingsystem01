<?php 
//Reads the variables sent via post from AT gateway
$sessionID = $_POST["sessionID"];
$serviceCODE = $_POST["serviceCODE"];
$phoneNumber = $_POST["phoneNumber"];
$text = $_POST["text"];

if ($text == "") {
    //This is the first request> Note how we start response with CON
    $response = "CON what would you like to check \n";
    $response .= "1. Birth certificate \n";
    $response .= "2. Identity documents";
} else if ($text == "1") {
        //Bussiness logic for the first level response
        $response .= "CON check if space is available \n";
        $response .= "1. Collection";
        $response .= "2. New Application";
  } else if($text == "2") {
    $response .= "1. Collection";
    $response .= "2. Re-Application";
  } else if ($text == "1*1") {
    $collectionDate = ". date("Y-m-d")";
    $response = "END your birth certificate is ready for collection on ".$collectionDate;

  } else if ($text == "1*2") {
    $newApplicationDate = "2021-11-04"; 
    $response = "END for new application you can come on this date " $newApplicationDate
  } else if ($text == "2*1") {
    $collectionDate = ". date("Y-m-d")";
    $response = "END your ID is ready for collection on ".$collectionDate;
  } else if ($text == "2*2") {
    $newApplicationDate = "2021-11-04"; 
    $response = "END for new application you can come on this date " $newApplicationDate
  }

  header('Content-type: text/plain');
  echo $response;


?>
