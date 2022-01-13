<?php
   $sql_details = array(
      'host' => 'localhost',
      'user' => 'root',
      'pass' => '',
      'db'   => 'regi_form'
      
   );

   $table = 'user_data';
 
   $primaryKey = 'id';
   
   $columns = array(
      array( 'db' => 'id', 'dt' => 0),
      array( 'db' => 'employee_id', 'dt' => 1),
      array( 'db' => 'name',  'dt' => 2),
      array( 'db' => 'email',   'dt' => 3),
      array( 'db' => 'designation', 'dt' => 4),
      array( 'db' => 'contact','dt' => 5),
      array( 'db' => 'blood_group','dt' => 6),
      array( 'db' => 'photo','dt' => 7)
   );   
   
   require_once './dataTables/ssp.php';
   echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns));
?>