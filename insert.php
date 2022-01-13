<?php
   $title = 'insert';

   require_once "./db_con/connect.php";
   require_once "./inc/header.php";

   // INSERT DATA
   if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
      $empID = strip_tags($_POST["empID"]);
      $name = strip_tags($_POST["name"]);
      $email = trim(strip_tags($_POST["email"]));
      $designation_id = strip_tags($_POST["designation"]);
      $phoneNum = strip_tags($_POST["phoneNum"]);
      $bloodGrp = strip_tags($_POST["bloodGrp"]);
      $Image_name = $_FILES["picture"]["name"];
      $Image_temp_location = $_FILES["picture"]["tmp_name"];

      $divide_name = explode(".", $Image_name);
      $lowercase_img_ext_name = strtolower(end($divide_name));
      $unique_name_generate = rand(1000000, 100000000).".".$lowercase_img_ext_name;
      $image_directory = 'img/';

      $insert_query = "INSERT INTO user_data(employee_id, name, email, designation_id, contact, blood_group, photo) VALUES('$empID', '$name', '$email', '$designation_id', '$phoneNum', '$bloodGrp', '$unique_name_generate')";
      $insert_sql = $connection->prepare($insert_query);
      $insert_sql->execute();

      move_uploaded_file($Image_temp_location, $image_directory.$unique_name_generate);

      header("Location: index.php");
   }
?>

<div class="container">
   <div class="form__content">
      <h1>Employee Registration Form</h1>
      <form action="" method="post" id="form" enctype="multipart/form-data">
         <div class="form__group">
            <label for="empID">Employee ID:</label>
            <input type="text" name="empID" id="empID" placeholder="Please Enter Employee ID">
            <span class="error_message" id="message1"></span>
         </div>
         <div class="form__group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Please Enter Name">
            <span class="error_message" id="message2"></span>
         </div>
         <div class="form__group">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" placeholder="Please Enter Email">
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
                     echo "<option value='".$design_fetch['id']."'>".$design_fetch['design_name']."</option>";
                  }
               ?>

            </select>
            <span class="error_message" id="message4"></span>
         </div>
         <div class="form__group">
            <label for="phoneNum">Contact Number:</label>
            <input type="text" name="phoneNum" id="phoneNum" placeholder="Please Enter Contact Number">
            <span class="error_message" id="message5"></span>
         </div>
         <div class="form__group">
            <label for="designation">Blood Group:</label>
            <input type="text" name="bloodGrp" id="bloodGrp" placeholder="Please Enter Blood Group">
            <span class="error_message" id="message6"></span>
         </div>
         <div class="form__group">
            <label for="picture">Picture:</label>
            <input type="file" name="picture" id="picture">
            <div class="imaPrev__container">
               <img src="" id="img_prev">
            </div>
            <span class="error_message" id="message7"></span>
         </div>
         <button type="submit" name="submit" class="submit__btn">Submit</button>
         <a href="index.php" class="back-btn">Go Back</a>
      </form>
   </div>
</div>

<?php require_once "./inc/footer.php"; ?>