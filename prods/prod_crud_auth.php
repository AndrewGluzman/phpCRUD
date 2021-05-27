<?php
// header('Content-Type: application/json');
include "./auth.php";
include "../connect.php";


$bodyData = file_get_contents('php://input');
$body = json_decode($bodyData); // phpData






switch ($_SERVER["REQUEST_METHOD"]) {
  case "POST":
    // echo json_encode($phpData);
    $query = "INSERT INTO shop (name, info, category, img_url, price, user_id) VALUES (?,?,?,?,?,?)";
    $stmnt = $conn->prepare($query);
    // s-> string , i -> int , d -> double , b -> blob small img (not in use)
    // ? -> לפי הסדר ככה הוא יציב את הפרמטרים שהעברנו בפונקציה
    // $checkToken -> מגיע מהקובץ אוט ומכיל את האיי די של המשתמש
    $stmnt->bind_param("ssssii", $body->name, $body->info, $body->category, $body->img_url, $body->price, $checkToken);
    // מבצע פעולה
    $stmnt->execute();
    $res = $stmnt->insert_id;
    // if success return id greater then 0 and if not return 0
    echo "{\"id\":{$res}}";
    break;

  case "DELETE":
    if (!isset($_GET['id'])) {
      echo  "{\"msg\":\"You need to send id as query string\"}";
      break;
    }
    $id = (int)$_GET['id'];
    $query = "DELETE FROM shop WHERE id = '{$id}' AND user_id = '{$checkToken}' ";
    $stmnt = $conn->prepare($query);
    $stmnt->execute();
    $res = $stmnt->affected_rows;
    echo "{\"n\":{$res}}";
    break;
  case "PUT":
    if (!isset($_GET['id'])) {
      echo  "{\"msg\":\"You need to send id as query string\"}";
      break;
    }
    $id = (int)$_GET['id'];
    // $query = "UPDATE shop SET cat=? , name=? , price=?, image=? WHERE id = '{$id}' ";
    $query = "UPDATE shop SET name=? , info=? , category=?, img_url=?, price=? WHERE id = ? AND user_id = ?  ";
    $stmnt = $conn->prepare($query);
    $stmnt->bind_param("ssssiii", $body->name, $body->info, $body->category, $body->ing_url, $body->price, $id, $checkToken);
    $stmnt->execute();
    $res = $stmnt->affected_rows;
    echo "{\"n\":{$res}}";
    break;
  default:
    echo "{\"msg\":\"You need to send body! and post,put,delete request\"}";
    break;
}
// $body->name, $body->info, $body->category, $body->img_url, $body->price, $checkToken