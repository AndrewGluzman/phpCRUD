<?php
    header('Content-Type: application/json');
    include "./connect.php";
    include_once "./classesProj/token.php";
  
    // יודע לאסוף את המידע שנשלח כבאדי
    $bodyData = file_get_contents('php://input');
  
    // מקודד את המידע שהגיע מהבאדי למידע דימי ג'ייסון בפורמט פי אץ פי
    $phpData = json_decode($bodyData);

    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      // לבדוק אם קיים משתמש עם האימייל שנשלח בבאדי
      $q = "SELECT * FROM users WHERE email = '{$phpData->email}'; ";
      $res = $conn->query($q);
      $user = (object)mysqli_fetch_assoc($res);
      if(!isset($user->id)){
        echo "{'err':'User not found'}";
      }
      else{
      
        // בדיקה עם הסיסמא מתאימה
        $validPass = password_verify($phpData->pass, $user->pass);
        
        // מחזיר 1 אם הצליח לבדוק את הסיסמא 
        // או נאל אם לא הצליח להתאים
        if(!$validPass){
          echo "{'err':'Password not match'}";
        }
        else{
          $newToken = Token::genToken($user->id);
          echo "{\"token\":\"{$newToken}\"}";
        }
      }
        


      // להחזיר טוקן
    }