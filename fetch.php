<?php
   require_once './db_con/connect.php';

   $query = "";
   $arr = array();
   
   $query .= "SELECT user_data.*, bloodgroup_list.blood_type, designation_list.design_name FROM user_data, bloodgroup_list, designation_list WHERE user_data.blood_group_id = bloodgroup_list.id AND user_data.designation_id = designation_list.id ";

   if (isset($_POST["search"]["value"])) {
      $search_query = $_POST["search"]["value"];
      $query .= "AND (user_data.employee_id LIKE '%$search_query%' OR user_data.name LIKE '%$search_query%' OR user_data.email LIKE '%$search_query%' OR designation_list.design_name LIKE '%$search_query%' OR user_data.contact LIKE '%$search_query%' OR bloodgroup_list.blood_type LIKE '%$search_query%') ";
   }

   if($_POST["length"] != -1) {
      $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
   }

   $fetch_sql = $connection->prepare($query);
   $fetch_sql->execute();
   while ($data = $fetch_sql->fetch(PDO::FETCH_ASSOC)) {
      $row_count = $fetch_sql->rowCount();
      $arr[] = $data;
   }

   function get_total_all_records($connect) {
      $statement = $connect->prepare('SELECT * FROM user_data');
      $statement->execute();
      return $statement->rowCount();
   }

   $output = array(
      "draw"              =>  intval($_POST["draw"]),
      "recordsTotal"      =>  $row_count,
      "recordsFiltered"   =>  get_total_all_records($connection),
      "data"              =>  $arr
  );
   echo json_encode($output);
?>