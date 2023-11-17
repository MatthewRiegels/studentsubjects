<!DOCTYPE html>
<html>
    <head>
        <title>Users</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <!-- form for adding users -->
        <form action="addusers.php" method = "post">
            First name:<input type="text" name="forename"><br>
            Last name:<input type="text" name="surname"><br>
            Password:<input type="password" name="passwd"><br> <!-- add confirm password -->
            House:<select name="house">
                <option value="Bramston">Bramston</option>
                <option value="Crosby">Crosby</option>
                <option value="Dryden">Dryden</option>
                <option value="Fisher">Fisher</option>
                <option value="Grafton">Grafton</option>
                <option value="Kirkeby">Kirkeby</option>
                <option value="Laundimer">Laundimer</option>
                <option value="Laxton">Laxton</option>
                <option value="New">New</option>
                <option value="Sadler">Sadler</option>
                <option value="Sanderson">Sanderson</option>
                <option value="School">School</option>
                <option value="Sidney">Sidney</option>
                <option value="St Anthony">St Anthony</option>
                <option value="Wyatt">Wyatt</option>
            </select><br>
            Year:<select name="year">
                <option value=0>staff</option>
                <option value=13>13</option>
                <option value=12>12</option>
                <option value=11>11</option>
                <option value=10>10</option>
                <option value=9>9</option>
            </select><br>
            <!--Creates a drop down list-->
            Gender:<select name="gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select><br>
            <!--Next 3 lines create a radio button which we can use to select the user role-->
            <input type="radio" name="role" value="Pupil" checked> Pupil<br>
            <input type="radio" name="role" value="Teacher"> Teacher<br>
            <input type="radio" name="role" value="Admin"> Admin<br>
            <input type="submit" value="Add User">
        </form>

        <!-- show all users -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblUsers");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            switch($row["Role"]){
                case 0:
                    $role="Pupil";
                    break;
                case 1:
                    $role="Teacher";
                    break;
                case 2:
                    $role="Admin";
                    break;
                }
            echo("(" . $role . ") " . $row["Forename"] . ' ' . $row["Surname"] . " - " . $row["House"] . " " . $row["Year"] . "<br>");
        }
        ?>
    </body>
</html>