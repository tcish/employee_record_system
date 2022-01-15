<?php
   require_once './db_con/connect.php';

   $fetch_query = "SELECT user_data.*, bloodgroup_list.blood_type, designation_list.design_name FROM user_data, bloodgroup_list, designation_list WHERE user_data.blood_group_id = bloodgroup_list.id AND user_data.designation_id = designation_list.id";
   $fetch_sql = $connection->prepare($fetch_query);
   $fetch_sql->execute();
   $arr = array();
   while ($data = $fetch_sql->fetch(PDO::FETCH_ASSOC)) {
      $arr["data"][] = $data;
   }
   echo json_encode($arr);
?>