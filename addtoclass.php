<?php
header('Refresh:2; url= pupildoessubject.php'); // if it breaks, comment this line first

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
try{
    include_once("connection.php");

    array_map("htmlspecialchars", $_POST);

    $stmt = $conn->prepare("INSERT INTO Tblpupilstudies (SubjectID,UserID,Classposition,Classgrade,Exammark,Comment)VALUES (:subjectid, :userid, null, null, null, null)");
    $stmt->bindParam(':subjectid', $_POST["subject"]);
    $stmt->bindParam(':userid', $_POST["student"]);
    $stmt->execute();

    $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE UserID = :userid");
    $stmt->bindParam(':userid', $_POST["student"]);
    $stmt->execute();
    $stud_arr = $stmt->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare("SELECT * FROM TblSubjects WHERE SubjectID = :subjectid");
    $stmt->bindParam(':subjectid', $_POST["subject"]);
    $stmt->execute();
    $subj_arr = $stmt->fetch(PDO::FETCH_ASSOC);

    echo($stud_arr["Surname"] . ', ' . $stud_arr["Forename"] . ' -> ' . $subj_arr["Subjectname"] . ' (' . $subj_arr["Teacher"] . ')');
}
catch (PDOException $e){
    echo "error".$e->getMessage();
}
$conn=null;
?>