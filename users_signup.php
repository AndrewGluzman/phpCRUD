<?php 
// מסביר לצד לקוח אם זה דפדפן אפליקציה פוסטמן שהוא מקבל בחזרה פורמט ג'ייסון
   header('Content-Type: application/json');
  include "./connect.php";

  

  // יודע לאסוף את המידע שנשלח כבאדי
  $bodyData = file_get_contents('php://input');

  // מקודד את המידע שהגיע מהבאדי למידע דימי ג'ייסון בפורמט פי אץ פי
  // אם יש עברית בג'ייסון צריך להוסיף פרמטר כנראה שני
  $phpData = json_decode($bodyData);


  // $_SERVER["REQUERT_METHOD"] -> סוג הבקשה שהגיעה כגון פוט , פוסט , דיליט או גיט
  // check how todo something like joi
  switch ($_SERVER["REQUEST_METHOD"]){
    case "POST":

      // $phpData->name = "<script></script>"
      $phpData->pass = password_hash($phpData->pass , PASSWORD_DEFAULT);
      $q = "INSERT INTO users (name,email,pass) VALUES ('{$phpData->name}','{$phpData->email}','{$phpData->pass}');";
      $conn->query($q);
      //$conn->insert_id -> מחזיר את האיי די של הרשומה החדשה שייצר
      echo "{\"id\":".$conn->insert_id."}";
      break;
    case "GET":
      echo "{\"id\":\"you need to send body widh name , email and password props\"}";
  }

  // $bcrypt = password_hash('123', PASSWORD_DEFAULT);
  // echo $bcrypt;

  // if(password_verify("123",$bcrypt)){
  //   echo "work";
  // }
// מציג מידע על הסביבת עבודה , כגון גרסה וכל מיני מודולים שמותקנים בסביבה
  //echo phpinfo();