<?php 
  include "./auth.php";
  include "../connect.php";

  
  // echo "{\"msg\":\"{$checkToken}\"}";
  // $checkToken מגיע מהקובץ של האוט ומכיל בתוכו את איי די של היוזר
  // מהטוקן
  $query = "SELECT * FROM users WHERE id = {$checkToken}";
  $res = $conn->query($query);

  $user = (object)mysqli_fetch_assoc($res);
  // מוחק את המאפיין מהאובייקט
  unset($user->pass);
  // $user->pass = NULL;
  echo json_encode($user);

  //11:00