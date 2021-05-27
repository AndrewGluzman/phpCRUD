<?php
// קובץ שאחראי כל כל התתחברות למסד נתונים
$dbhost = "localhost";
$dbuser = "id16866144_fanat2323";
$dbpass = 'S?IS6J*J?/soSA2M';
$dbname = "id16866144_fanat23";

// ככה אני מזהה שאני בשרת מקומי
if ($_SERVER["SERVER_ADDR"] == "::1") {
  $dbhost = "localhost";
  $dbuser = "root";
  $dbpass = "";
  $dbname = "panda";
}



$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_error()) {
  // die -> עוצר את השרת ומציג את ההודעה
  die("cant connect");
}
// שידע לתמוך בעברית ובשפות
$conn->query("SET NAMES 'utf8'");
