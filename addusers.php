<?php
include_once("connection.php");
switch($_POST["role"]){
    case "Pupil":
        $role=0;
        break;
    case "Teacher":
		$role=1;
		break;
	case "Admin":
		$role=2;
		break;
}
echo $_POST["gender"]."<br>";
echo $_POST["forename"]."<br>";
echo $_POST["surname"]."<br>";
echo $_POST["house"]."<br>";
echo $_POST["year"]."<br>";
echo $_POST["passwd"]."<br>";
echo $_POST["role"]."<br>";
?>