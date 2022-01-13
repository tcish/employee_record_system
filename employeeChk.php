<?php
   require_once "./db_con/connect.php";

   $empID = strip_tags($_POST["empID"]);
   $urlId = strip_tags($_POST["urlId"]);

   $eQuery = "SELECT id, employee_id FROM user_data WHERE employee_id = '$empID'";
   $eSql = $connection->prepare($eQuery);
   $eSql->execute();
   $eFetch = $eSql->fetch(PDO::FETCH_ASSOC);

   if (!$urlId) {
      if ($eFetch["employee_id"] == $empID) {
         echo "Employee ID already exist!";
      }
   } else if ($eFetch["id"] !== $urlId) {
      echo "Employee ID already exist!";
   }
?>