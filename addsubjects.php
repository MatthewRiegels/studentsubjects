<?php
header('Location: users.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

echo $_POST["subjectname"]."<br>";
echo $_POST["teachername"]."<br>";

$stmt = $conn->prepare("INSERT INTO TblUsers (SubjectID,Subjectname,Teacher)VALUES (null,:subjectname,:teachername)");
$stmt->bindParam(':subjectname', $_POST["subjectname"]);
$stmt->bindParam(':teachername', $_POST["teachername"]);
$stmt->execute();
$conn=null;
?>