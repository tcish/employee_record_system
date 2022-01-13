<?php
   $title = 'update';

   require_once "./db_con/connect.php";
   require_once "./inc/header.php";

   if (!isset($_GET["id"]) OR $_GET["id"] == NULL) {
      header("Location: index.php");
   }else {
      $id = $_GET["id"];
      
      $fetch_query = "SELECT * FROM user_data WHERE id = $id";
      $fetch_sql = $connection->prepare($fetch_query);
      $fetch_sql->execute();
      $data = $fetch_sql->fetch((PDO::FETCH_ASSOC));
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
      $empID = strip_tags($_POST["empID"]);
      $name = strip_tags($_POST["name"]);
      $email = trim(strip_tags($_POST["email"]));
      $designation_id = strip_tags($_POST["designation"]);
      $phoneNum = strip_tags($_POST["phoneNum"]);
      $bloodGrp_id = strip_tags($_POST["bloodGrp"]);
      $Image_name = $_FILES["picture"]["name"];
      $Image_temp_location = $_FILES["picture"]["tmp_name"];

      $divide_name = explode(".", $Image_name);
      $lowercase_img_ext_name = strtolower(end($divide_name));
      $unique_name_generate = rand(1000000, 100000000).".".$lowercase_img_ext_name;
      $image_directory = 'img/';

      if (!empty($Image_name)) {
         // DELETING OLD PHOTO BEFORE UPLOADING NEW ONE
         $pic_del_query = "SELECT photo FROM user_data WHERE id = '$id'";
         $pic_del_sql = $connection->prepare($pic_del_query);
         $pic_del_sql->execute();
         $output = $pic_del_sql->fetch(PDO::FETCH_ASSOC);
         $del_pic = $output["photo"];
         unlink("img/$del_pic");

         $update_data = "UPDATE user_data SET
                           employee_id = '$empID',
                           name = '$name',
                           email = '$email',
                           designation_id = '$designation_id',
                           contact = '$phoneNum',
                           blood_group_id = '$bloodGrp_id',
                           photo = '$unique_name_generate'
                           WHERE id = '$id'";
         $update = $connection->prepare($update_data);
         $update->execute();

         move_uploaded_file($Image_temp_location, $image_directory.$unique_name_generate);

         header("Location: index.php");
      } else {
         $update_data = "UPDATE user_data SET
                           employee_id = '$empID',
                           name = '$name',
                           email = '$email',
                           designation_id = '$designation_id',
                           contact = '$phoneNum',
                           blood_group_id = '$bloodGrp_id'
                           WHERE id = '$id'";
         $update = $connection->prepare($update_data);
         $update->execute();

         header("Location: index.php");
      }
   }

   if ($fetch_sql->rowCount() > 0 && $id === $data["id"]) { ?>
      <div class="container">
         <div class="form__content">
            <h1>Update Employee Data</h1>
            <form action="" method="post" id="form" enctype="multipart/form-data">
               <div class="form__group">
                  <label for="empID">Employee ID:</label>
                  <input type="text" name="empID" id="empID"  onchange="validateForm()" placeholder="Please Enter Employee ID" value="<?php echo $data["employee_id"]; ?>">
                  <span class="error_message" id="message1"></span>
               </div>
               <div class="form__group">
                  <label for="name">Name:</label>
                  <input type="text" name="name" id="name" onchange="validateName()" placeholder="Please Enter Name" value="<?php echo $data["name"]; ?>">
                  <span class="error_message" id="message2"></span>
               </div>
               <div class="form__group">
                  <label for="email">Email:</label>
                  <input type="text" name="email" id="email" placeholder="Please Enter Email" value="<?php echo $data["email"]; ?>">
                  <span class="error_message" id="message3"></span>
               </div>
               <div class="form__group">
                  <label for="designation">Designation:</label>
                  <select name="designation" id="designation">
                     <option value="">Select Designation</option>

                     <?php
                        $design_query = "SELECT * FROM designation_list";
                        $design_sql = $connection->prepare($design_query);
                        $design_sql->execute();
                        while ($design_fetch = $design_sql->fetch(PDO::FETCH_ASSOC)) {
                           if ($design_fetch["id"] === $data["designation_id"]) {
                              echo "<option selected value='".$design_fetch['id']."'>".$design_fetch['design_name']."</option>";
                           } else {
                              echo "<option value='".$design_fetch['id']."'>".$design_fetch['design_name']."</option>";
                           }
                        }
                     ?>

                  </select>
                  <span class="error_message" id="message4"></span>
               </div>
               <div class="form__group">
                  <label for="phoneNum">Contact Number:</label>
                  <input type="text" name="phoneNum" id="phoneNum" placeholder="Please Enter Contact Number" value="<?php echo $data["contact"]; ?>">
                  <span class="error_message" id="message5"></span>
               </div>
               <div class="form__group">
                  <label for="bloodGrp">Blood Group:</label>
                  <select name="bloodGrp" id="bloodGrp">
                     <option value="">Select Blood Group</option>

                     <?php
                        $bldGrp_query = "SELECT * FROM bloodgroup_list";
                        $bldGrp_sql = $connection->prepare($bldGrp_query);
                        $bldGrp_sql->execute();
                        while ($bldGrp_fetch = $bldGrp_sql->fetch(PDO::FETCH_ASSOC)) {
                           if ($bldGrp_fetch["id"] === $data["blood_group_id"]) {
                              echo "<option selected value='".$bldGrp_fetch['id']."'>".$bldGrp_fetch['blood_type']."</option>";
                           } else {
                              echo "<option value='".$bldGrp_fetch['id']."'>".$bldGrp_fetch['blood_type']."</option>";
                           }
                        }
                     ?>

                  </select>
                  <span class="error_message" id="message6"></span>
               </div>
               <div class="form__group">
                  <label for="picture">Picture:</label>
                  <input type="file" name="picture" id="picture">
                  <div class="imaPrev__container">
                     <img src="./img/<?php echo $data["photo"]; ?>" id="img_prev">
                  </div>
                  <span class="error_message" id="message7"></span>
               </div>
               <div class="btn__group">
                  <button type="submit" name="submit">Submit</button>
                  <a href="index.php">Go Back</a>
               </div>
            </form>
         </div>
      </div>

<?php } else {
   header("Location: index.php");
}

   require_once "./inc/footer.php";
?>