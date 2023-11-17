<?php
// header('Location: Subjects.php'); // if it breaks, comment this line first

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
    include_once("connection.php");

    array_map("htmlspecialchars", $_POST);

    echo($_POST["subjectname"])
    echo($_POST["teacherid"])


    $stmt = $conn->prepare("INSERT INTO TblSubjects (SubjectID,Subjectname,TeacherID)VALUES (null,:subjectname,:teacherid)");
    $stmt->bindParam(':subjectname', $_POST["subjectname"]);
    $stmt->bindParam(':teacherid', $_POST["teacherid"]);
    $stmt->execute();
}
catch (PDOException $e){
    echo "error".$e->getMessage();
}
$conn=null;
?>