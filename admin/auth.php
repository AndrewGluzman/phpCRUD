<?php 
  header('Content-Type: application/json');
  // include_once -> אם בטעות עשו כבר אינקלוד
  // לא יבצע אינקלוד שוב
  include_once "../classesProj/token.php";

  //TODO: נכניס את כל הבידקה למחלקה של הטוקן

  $token = getallheaders();
// בדוק בכלל אם נשלח טוקן
  if(!isset($token["auth-token"])){
    // die - עוצר את הכל
    die("{\"err\":\"you must send token\"}");
  }

  // לבדוק אם הטוקן תקין או תקף
  $checkToken = Token::validateToken($token["auth-token"]);
  if(!$checkToken){
    die("{\"err\":\"token not valid or expired\"}");
  }


  // echo "all good!";
  // 14:58