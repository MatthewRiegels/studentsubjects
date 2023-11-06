<?php
header('Location: users.php'); // if it breaks, comment this line first

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
    include_once("connection.php");

    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("INSERT INTO TblSubjects (SubjectID,Subjectname,Teacher)VALUES (null,:subjectname,:teachername)");
    $stmt->bindParam(':subjectname', $_POST["subjectname"]);
    $stmt->bindParam(':teachername', $_POST["teachername"]);
    $stmt->execute();
}
catch (PDOException $e){
    echo "error".$e->getMessage();
}
$conn=null;
?>