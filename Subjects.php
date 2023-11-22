<!DOCTYPE html>
<html>
    <head>
        <title>Subjects</title>
    </head>
    <body>
        <a href="index.html">back to the homepage</a><br><br>
        <!-- form for adding subjects -->
        <form action="addsubjects.php" method = "post">
            Subject name:<input type="text" name="subjectname"><br>
            Teacher:<select name="teacherid">
                <?php
                include_once('connection.php');
                $stmt = $conn->prepare("SELECT * FROM TblUsers WHERE Role = 1 ORDER BY Surname ASC");
                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                {
                    echo('<option value='.$row["UserID"].'>'.$row["Surname"].', '.$row["Forename"].'</option>');
                }
                ?>
            </select>
            <br>
            <input type="submit" value="Add Subject">
        </form>

        <!-- show all subjects -->
        <?php
        include_once('connection.php');
        $stmt = $conn->prepare("SELECT * FROM TblSubjects");
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){ // how to make this show name??
            echo($row["Subjectname"] . ": " . $row["TeacherID"] . "<br>"); // prevent duplicats somehow
        }
        ?>
    </body>
</html>