<?php
   require_once "./db_con/connect.php";

   $email = strip_tags($_POST["email"]);
   $urlId = strip_tags($_POST["urlId"]);

   $query = "SELECT id, email FROM user_data WHERE email = '$email'";
   $sql = $connection->prepare($query);
   $sql->execute();
   $fetch = $sql->fetch(PDO::FETCH_ASSOC);

   if (!$urlId) {
      if ($fetch["email"] == $email) {
         echo "Email already exist!";
      }
   } else if ($fetch["id"] !== $urlId) {
      echo "Email already exist!";
   }
?>