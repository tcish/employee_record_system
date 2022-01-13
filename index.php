<?php
   $title = 'index';

   require_once "./db_con/connect.php";
   require_once "./inc/header.php";

   // DELETING DATA
   if (isset($_GET["delete_id"]) && $_GET["delete_id"] != NULL) {
      $id = $_GET["delete_id"];

      $pic_del_query = "SELECT photo FROM user_data WHERE id = '$id'";
      $pic_del_sql = $connection->prepare($pic_del_query);
      $pic_del_sql->execute();
      $output = $pic_del_sql->fetch(PDO::FETCH_ASSOC);
      $del_pic = $output["photo"];
      unlink("img/$del_pic");

      $query = "DELETE FROM user_data WHERE id = '$id'";
      $sql = $connection->prepare($query);
      $sql->execute();

      header("Location: index.php");
   }
?>

<div class="tbl_container">
   <h1>Employee List</h1>
   <a href="./insert.php" class="add-btn">Add Data</a>
   <table id="employeeData" class="tbl hover stripe responsive">
      <thead>
         <tr>
            <th>Employee ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Designation</th>
            <th>Contact</th>
            <th>Blood Group</th>
            <th>Photo</th>
            <th>Action</th>
         </tr>
      </thead>
   </table>
</div>

<?php require_once "./inc/footer.php"; ?>