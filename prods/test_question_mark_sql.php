<?php 
header('Content-Type: application/json');
include "../connect.php";


$queryString = "SELECT * FROM shop";
$query = $conn->prepare($queryString);
 

// עוד שיטה למנוע SQL INJEXTION
// למשל מונע את האפשרות הבאה להוציא את כל המידע מהמסד
// http://localhost/ort/l53_5_5/prods/list.php?prodId=7 OR 1=1
if(isset($_GET['id'])){
  $queryString = "SELECT * FROM shop WHERE id = ?";
  $query = $conn->prepare($queryString);
  // צריך לבדוק איך אפשר לבדוק כמה סימני שאלה וכמה משתנים 
  // איך מעבירים אותם
  $query->bind_param('s',$_GET['id']);
}


$query->execute();
$res = $query->get_result();
$json_ar = [];
while($row = mysqli_fetch_assoc($res)){
  array_push($json_ar,(object)$row);
}

echo json_encode($json_ar);