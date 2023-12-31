<?php
header('Location: users.php'); // if it breaks, comment this line first

include_once("connection.php");

array_map("htmlspecialchars", $_POST);

switch($_POST["role"]){
    case "Pupil":
        $role=0;
		$year=$_POST["year"];
        break;
    case "Teacher":
		$role=1;
		$year=0;
		break;
	case "Admin":
		$role=2;
		$year=0;
		break;
}

echo $_POST["gender"]."<br>";
echo $_POST["forename"]."<br>";
echo $_POST["surname"]."<br>";
echo $_POST["house"]."<br>";
echo $_POST["year"]."<br>";
echo $_POST["passwd"]."<br>";
echo $_POST["role"]."<br>";

$stmt = $conn->prepare("INSERT INTO TblUsers (UserID,Gender,Surname,Forename,Password,House,Year ,Role)VALUES (null,:gender,:surname,:forename,:password,:house,:year,:role)");
$stmt->bindParam(':forename', $_POST["forename"]);
$stmt->bindParam(':surname', $_POST["surname"]);
$stmt->bindParam(':house', $_POST["house"]);
$stmt->bindParam(':year', $year);
$stmt->bindParam(':password', $_POST["passwd"]);
$stmt->bindParam(':gender', $_POST["gender"]);
$stmt->bindParam(':role', $role);
$stmt->execute();
$conn=null;
?>